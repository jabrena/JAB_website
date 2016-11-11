import lejos.nxt.*;

public class TLBTest {

	private static DebugMessages dm;
	private static TamiyaLunchBox TLB;
	
	public static void main(String[] args) throws Exception{
		dm = new DebugMessages();
		dm.setLCDLines(6);
		dm.echo("Testing NXTe");
		
		TLB = new TamiyaLunchBox();
		
		boolean onoff = false;
		TLB.stop();
		
		try{
			
			while(!Button.ESCAPE.isPressed()){
				
				if (Button.RIGHT.isPressed()){
					TLB.turnRight();
					dm.echo("TLB Turn right");
					Thread.sleep(1000);
				}

				if (Button.ENTER.isPressed()){
					if(onoff == false){
						TLB.forward();
						dm.echo("TLB Forward");
						onoff = true;
					}else{
						TLB.stopSlowly();
						dm.echo("TLB Stop");
						onoff = false;
					}
					Thread.sleep(1000);
				}
				
				if (Button.LEFT.isPressed()){
					TLB.turnLeft();
					dm.echo("TLB Turn left");
					Thread.sleep(1000);
				}						
			}
			
			//At the end, unload all Servos
			TLB.turnOff();		
			dm.echo("Test finished");
			
		}catch(Exception e){
			dm.echo(e.getMessage());
		}		
	}
}
