//ICOMMAND PACKAGES
import icommand.platform.nxt.*;
import icommand.nxtcomm.*;
//STANDARD J2SE
import java.util.Random;

public class R2D2_LANGUAJE {

	public static void speak(){
		Random rnd = new Random();
			
		for(int i=0; i<=100; i++){
			int frequency = rnd.nextInt();
			int duration = rnd.nextInt();
			Speaker.playTone(i*frequency, duration);
		}
		
		Speaker.stopSoundPlayback();
		
		NXTCommand.close();
	}

	public static void main(String [] args) throws Exception {
		System.out.println("[NXT R2D2] Hello");
		
		speak();
	
		System.out.println("[NXT R2D2] See you later");
	}
	
	protected void finalize() throws Throwable {
	    try {
	    	NXTCommand.close();
	    } finally {
	        super.finalize();
	    }
	}
}