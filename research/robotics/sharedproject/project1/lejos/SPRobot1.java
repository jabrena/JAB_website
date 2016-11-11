import lejos.nxt.*;
import lejos.navigation.*;
import java.util.Random;

/**
 * SPRobot1, is a class designed to model the robot used in the project
 * LRobotikas's Shared project.
 * The robot uses 2 NXT Motors and 1 Touch sensor
 * 
 * @author Juan Antonio Brenha Moral
 * @version 1.0
 * 
 */
public class SPRobot1{

	private TouchSensor ts;
	private Pilot pilot;
	private Motor leftMotor;
	private Motor rightMotor;

	// set to true when you order a forward and the motor goes backward
	boolean reverseOn=true;

	//all measured in mm except degrees for "rotate"
	float wheelDiameter=81.6f;
	float distanceBetweenWheels=125;
	int speed = 720;// 2 RPM
	
	/**
	 * The constructor
	 */
	SPRobot1(){
		ts =new TouchSensor(SensorPort.S1);
		leftMotor = Motor.B;
		rightMotor = Motor.C;
		
		pilot = new Pilot(wheelDiameter,distanceBetweenWheels,leftMotor, rightMotor,reverseOn);
		pilot.setSpeed(speed);
	}

	/**
	 * This method is used to go forward
	 */
	public void forward(){
		pilot.forward();
	}
	
	/**
	 * This method is used to stop the robot
	 */
	public void stop(){
		pilot.stop();
	}
	
	public void demoTravel(){
		//squared travel/viaje cuadrado
		for (int i=0;i<5;i++){
			pilot.travel(350);
			pilot.rotate(-90);
		}
	}
	
	/**
	 * Method used to give information about to detect an obstacle with the
	 * Touch sensor
	 * @return
	 */
	public boolean detectFrontalObstacle(){
		return ts.isPressed();
	}
	
	private int getRandomNumberInRange(int range){
		int randomValue = 0;
		Random generator = new Random();
		randomValue = generator.nextInt(range) + 1;
		return randomValue;
	}

	public void takeDecissions(){
		Sound.beep();
		int steering = getRandomNumberInRange(1);
		int magnitude = getRandomNumberInRange(500) + 500;

		//Go Backward and Stop
		pilot.travel(-200);
		pilot.stop();

		//Turn left
		if(steering == 0){
			pilot.rotate(magnitude);
		}else{//Turn right
			pilot.rotate(-magnitude);
		}
	}
	
}
