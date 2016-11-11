import lejos.nxt.*;

/**
 * This example show how to solve Phase1 in the project1 from
 * LRobotikas's Shared Project
 * @author Juan Antonio Brenha Moral
 *
 */
public class Phase1Test {

	private static SPRobot1 spr;
	
	static void main(String[] arg){
		
		spr = new SPRobot1();
		
		
		//While the user doesn't exit the program
		while(!Button.ESCAPE.isPressed()){
			if(spr.detectFrontalObstacle()){
				spr.stop();
			}else{
				spr.forward();
			}
		}
	}
}
