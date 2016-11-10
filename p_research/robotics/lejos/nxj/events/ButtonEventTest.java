import  lejos.nxt.*;

public class ButtonEventTest
{
    public static void main (String[] args)
    {
        Button.ENTER.addButtonListener(new myButtonListener());   
        while (true);
    }
}

class myButtonListener implements ButtonListener{
	public void buttonPressed(Button b) {
		LCD.drawString("ENTER pressed",0,0);
	}

	public void buttonReleased(Button b) {
		LCD.clear();         
	}
}

