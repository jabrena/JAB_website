
import lejos.nxt.*;


/**
 * This example has been developed to test DC Motors with NXTe
 * @author juanantonio.breña
 *
 */
public class LatteboxTest3{
	private static NXTe NXTeObj;
	private static DebugMessages dm;
	private static int motion;
	private static int topSpeed = 1020;
	private static int minSpeed = 800;
	private static int speedIncrement = 20;
	private static int currentSpeed;
	private static int angle;
	private static boolean onoff = false;
	
	//Main
	public static void main(String[] args) throws Exception{
		dm = new DebugMessages();
		dm.setLCDLines(6);
		dm.echo("Testing NXTe");
		
		try{

			NXTeObj = new NXTe(SensorPort.S1);//NXTe Controller plugged in Port1
			NXTeObj.addLSC(0);
			dm.echo("Calibrating LSC");
			//Servo 1 connected in location 1			
			NXTeObj.LSC(0).addServo(1,"Tamiya DC Motor, MABUCHI Motor RS 540SH");
			NXTeObj.LSC(0).calibrate();
			NXTeObj.LSC(0).Servo(0).load();
			NXTeObj.LSC(0).Servo(0).setMinAngle(minSpeed);
			NXTeObj.LSC(0).Servo(0).setMaxAngle(topSpeed);
			NXTeObj.LSC(0).Servo(0).setAngle(topSpeed);
			
			
			while(!Button.ESCAPE.isPressed()){
				
				if (Button.LEFT.isPressed()){
					currentSpeed = NXTeObj.LSC(0).Servo(0).getAngle();
					if((currentSpeed - speedIncrement)<= minSpeed){
						dm.echo("Maximum Speed");
					}else{
						NXTeObj.LSC(0).Servo(0).setAngle((currentSpeed - speedIncrement));
						while(NXTeObj.LSC(0).Servo(0).isMoving() == true){}
						angle = NXTeObj.LSC(0).Servo(0).getAngle();
						dm.echo(angle);
					}
				}

				if (Button.ENTER.isPressed()){
					if(onoff == true){
						NXTeObj.LSC(0).Servo(0).load();
						dm.echo("Load servo");
						onoff = false;
					}else{
						NXTeObj.LSC(0).Servo(0).unload();
						dm.echo("Unload servo");
						onoff = true;
					}
				}
				
				if (Button.RIGHT.isPressed()){
					currentSpeed = NXTeObj.LSC(0).Servo(0).getAngle();
					if((currentSpeed + speedIncrement)>= topSpeed){
						dm.echo("Minimal Speed");
					}else{
						NXTeObj.LSC(0).Servo(0).setAngle((currentSpeed + speedIncrement));
						while(NXTeObj.LSC(0).Servo(0).isMoving() == true){}
						angle = NXTeObj.LSC(0).Servo(0).getAngle();
						dm.echo(angle);
					}
				}						
			}
			
		}catch(Exception e){
			dm.echo(e.getMessage());
		}

		//At the end, unload all Servos
		NXTeObj.LSC(0).unloadAllServos();
		dm.echo("Test finished");
	}
}
