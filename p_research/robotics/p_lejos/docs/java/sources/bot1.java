import icommand.nxtcomm.NXTCommand;
import icommand.platform.nxt.*;
import icommand.robotics.*; 

public class bot1 {

	Ultrasonic sonar1;
	Ultrasonic sonar2;
	SyncMotors sm;
	ServoNavigator sn;
	
	
	public static void main(String[] args) throws Exception{
		System.out.println("[NXT MECH1] Ready");
		Motor.A.setSpeed(100);
		Motor.B.setSpeed(100);
		Ultrasonic sonar1 = new Ultrasonic(Sensor.S1);
		Ultrasonic sonar2 = new Ultrasonic(Sensor.S2);
		sonar1.setMetric(true);
		sonar2.setMetric(true);
		SyncMotors sm = new SyncMotors(Motor.A,Motor.B);
		ServoNavigator sn = new ServoNavigator(5.6, 5,sm);
		
		int distance1;
		int MECHBLOCKEDCounter = 0;
		
		while(Battery.getVoltageMilliVolt() >1000){
			distance1 = sonar1.getDistance();
			System.out.println("Sonar1: " + distance1);

			if(distance1 >=30){
				sn.forward();
			}else{
				sn.stop();
				Thread.sleep(1000);
				MECHBLOCKEDCounter ++;
			}
			
			System.out.println("Battery: " + Battery.getVoltageMilliVolt());
			
			if(MECHBLOCKEDCounter == 10){
				System.out.println("[NXT MECH1] [MESAGGE] I noticed that I blocked");
				System.out.println("[NXT MECH1] [MESAGGE] I need more 'intelligence'");
				break;
			}
		}
		
		NXTCommand.close();
		System.out.println("[NXT MECH1] Stop");
	}

	protected void finalize() throws Throwable {
	    try {
	    	NXTCommand.close();
	    } finally {
	        super.finalize();
	    }
	}
}
