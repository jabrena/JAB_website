import lejos.nxt.*;

/*
 * This class has beend developed to manage Tamiya LunchBox
 * http://www.tamiya.com/english/products/58347lunchbox/index.htm
 * http://www.youtube.com/watch?v=wIopuM58rJg
 * 
 * @author Juan Antonio Brenha Moral
 */
public class TamiyaLunchBox {
	private NXTe NXTeObj;
	private LServo DCMotor;
	private LServo RCServo;
	private final int minSpeed = 1020;
	private final int maxSpeed = 700;
	private final int maxAngle = 2000;
	private final int minAngle = 0;
	
	public TamiyaLunchBox(){
		NXTeObj = new NXTe(SensorPort.S1);
		NXTeObj.addLSC(0);

		NXTeObj.getLSC(0).addServo(1,"SAVOX, Digital SC-0352");
		NXTeObj.getLSC(0).addServo(3,"Tamiya DC Motor, MABUCHI Motor RS 540SH");
		
		NXTeObj.getLSC(0).calibrate();
		NXTeObj.getLSC(0).Servo(0).load();
		NXTeObj.getLSC(0).Servo(1).load();
		//NXTeObj.getLSC(0).loadAllServos();

		NXTeObj.getLSC(0).Servo(0).setMinAngle(minAngle);
		NXTeObj.getLSC(0).Servo(0).setMaxAngle(maxAngle);

		NXTeObj.LSC(0).Servo(0).setAngle(960);
		
		RCServo = NXTeObj.getLSC(0).getServo(0);
		DCMotor = NXTeObj.getLSC(0).getServo(1);
		


	}
	
	public void forward(){
		//NXTeObj.getLSC(0).Servo(1).load();
		DCMotor.setSpeed(maxSpeed);
		while(DCMotor.isMoving() == true){}	
	}
	
	public void backward(){
		//?
	}
	
	public void stop(){
		DCMotor.setSpeed(minSpeed);
		while(DCMotor.isMoving() == true){}
	}
	
	public void stopSlowly(){
		DCMotor.setSpeed(0);
		while(DCMotor.isMoving() == true){}
		DCMotor.setSpeed(400);
		while(DCMotor.isMoving() == true){}
		DCMotor.setSpeed(800);
		while(DCMotor.isMoving() == true){}
		DCMotor.setSpeed(1000);
		while(DCMotor.isMoving() == true){}		
		DCMotor.setSpeed(1200);
		while(DCMotor.isMoving() == true){}
		DCMotor.setSpeed(1500);
		while(DCMotor.isMoving() == true){}
	}
	
	public void turnLeft(){
		RCServo.goToMinAngle();
		while(RCServo.isMoving() == true){}
	}
	
	public void turnRight(){
		RCServo.goToMaxAngle();
		while(RCServo.isMoving() == true){}
	}
	
	public void turnOff(){
		NXTeObj.getLSC(0).unloadAllServos();
	}
}
