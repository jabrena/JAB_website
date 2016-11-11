import lejos.nxt.*;
import javax.microedition.lcdui.Graphics;

public class RADAR_BOT {

	static int batteryLife;	
	
	public static void credits(){
		LCD.clear();
		LCD.drawString("Juan Antonio",0,1);
		LCD.drawString("Brenha. Moral",0,2);
		LCD.drawString("juanantonio.info",0,3);
		LCD.refresh();
	}
	
	public static void main(String [] options) throws Exception {
		boolean bl_detect = false;
		boolean bl_detectPattern = false;
		
		batteryLife = Battery.getVoltageMilliVolt();
		
		//Motor settings
		Motor.A.setSpeed(900);
		
		//Instances
		CompassSensor compassObj = new CompassSensor(SensorPort.S2);
		UltrasonicSensor usObj = new UltrasonicSensor(SensorPort.S1);
		Graphics gObj = new Graphics();
		RADAR1_8 radarObj = new RADAR1_8(compassObj,usObj,Motor.A,gObj);

		//Store historical information about the enviroment where, Radar Bot operate
		radarObj.knowEnviroment();
		Sound.playTone(50, 200);
		radarObj.moveToDegreeCero();
		radarObj.showEnviroment();
		
		//Motor.A.setSpeed(300);		
		Motor.A.forward();
		while(!Button.ESCAPE.isPressed()){
			radarObj.detectChanges();
			
			//Every 360 degrees, detect patterns
			if((int) compassObj.getDegreesCartesian()>= 355){
				bl_detect = true;
			}
			
			if(bl_detect){
				bl_detect = false;
				bl_detectPattern = radarObj.detectPattern();
				if(bl_detectPattern){
					Sound.playTone(50, 200);
					radarObj.moveToDegreeCero();
					radarObj.showEnviroment();
					radarObj.showDetections();
					
					Thread.sleep(5000);
					Motor.A.forward();
					bl_detectPattern = false;
				}
			}
		}

		Motor.A.stop();
		Thread.sleep(5000);
		credits();
		Thread.sleep(1000);		
	}
}