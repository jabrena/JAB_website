//import lejos.nxt.addon.*;
import lejos.nxt.*;
import java.util.Random;

/**
 * Example designed to test Mindsensors NXT Servo
 * 
 * @author Juan Antonio Brenha Moral
 *
 */
public class NXTServoTest4{
	private static String appName = "NXTServo Test";
	private static String appVersion = "v0.2";

	private static MSC msc;
	private static Random rnd;
	
	public static void main(String[] args){
		LCD.drawString(appName, 0, 0);
		LCD.drawString("#################", 0, 2);
		LCD.drawString("#################", 0, 6);

		msc = new MSC(SensorPort.S1);
		msc.addServo(1,"Mindsensors RC Servo 9Gr");
		msc.addServo(2,"Mindsensors RC Servo 9Gr");
		msc.addServo(3,"Mindsensors RC Servo 9Gr");
		msc.addServo(4,"Mindsensors RC Servo 9Gr");
		//Set to initial angle
		msc.getServo(0).setAngle(0);
		msc.getServo(1).setAngle(0);
		msc.getServo(2).setAngle(0);
		msc.getServo(3).setAngle(0);
		
		int angle1 = 0;
		int angle2 = 0;
		int angle3 = 0;
		int angle4 = 0;
		int pulse = 0;
		int NXTServoBattery = 0;
		
		rnd = new Random();
		

		while(!Button.ESCAPE.isPressed()){
			NXTServoBattery = msc.getBattery();

			angle1 = rnd.nextInt(180);
			angle2 = rnd.nextInt(180);
			angle3 = rnd.nextInt(180);
			angle4 = rnd.nextInt(180);
			msc.getServo(0).setAngle(angle1);
			msc.getServo(1).setAngle(angle2);
			msc.getServo(2).setAngle(angle3);
			msc.getServo(3).setAngle(angle4);

			clearRows();
			LCD.drawString("Battery: " + NXTServoBattery, 0, 3);
			LCD.drawString("Pulse:   " + msc.getServo(0).getPulse(), 0, 4);
			LCD.drawString("Angle:   " + msc.getServo(0).getAngle(), 0, 5);
			LCD.refresh();
			
			try {Thread.sleep(200);} catch (Exception e) {}
		}

		//Set to initial angle
		msc.getServo(0).setAngle(0);
		msc.getServo(1).setAngle(0);
		msc.getServo(2).setAngle(0);
		msc.getServo(3).setAngle(0);

		LCD.drawString("Test finished",0,7);
		LCD.refresh();
		try {Thread.sleep(1000);} catch (Exception e) {}
		credits(3);
		System.exit(0);
	}
	
	/**
	 * Internal method used to clear some rows in User Interface
	 */
	private static void clearRows(){
		LCD.drawString("          ", 0, 3);
		LCD.drawString("          ", 0, 4);
		LCD.drawString("          ", 0, 5);
	}

	/**
	 * Final Message
	 * 
	 * @param seconds
	 */
	private static void credits(int seconds){
		LCD.clear();
		LCD.drawString("LEGO Mindstorms",0,1);
		LCD.drawString("NXT Robots  ",0,2);
		LCD.drawString("run better with",0,3);
		LCD.drawString("Java leJOS",0,4);
		LCD.drawString("www.lejos.org",0,6);
		LCD.refresh();
		try {Thread.sleep(seconds*1000);} catch (Exception e) {}
	}
}
