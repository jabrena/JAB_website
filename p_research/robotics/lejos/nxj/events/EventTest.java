import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class EventTest{
	public static void main(String[] args){
		JFrame frame = new EventFrame();
		frame.setVisible(true);
	}
}

class EventFrame extends JFrame{
	public EventFrame(){
		setTitle("Demo");
		setSize(300,100);
		addWindowListener(new MainWindowListener());
		
		Container contenido = getContentPane();
		contenido.add(new ButtonPanel());
	}
}

class MainWindowListener extends WindowAdapter{
	public void windowClosing(WindowEvent e){
		System.exit(0);
	}
}

class ButtonPanel extends JPanel implements ActionListener{
	private JButton redButton;
	private JButton greenButton;
	private JButton blueButton;
	
	public ButtonPanel(){
		redButton = new JButton("Red");
		greenButton = new JButton("Green");
		blueButton = new JButton("Blue");
		
		this.add(redButton);
		this.add(greenButton);
		this.add(blueButton);

		redButton.addActionListener(this);
		greenButton.addActionListener(this);
		blueButton.addActionListener(this);
	}

	public void actionPerformed (ActionEvent event){
		Object source = event.getSource();
		Color color = getBackground();
		
		if(source == redButton){
			color = Color.RED;
		}else if(source == greenButton){
			color = Color.GREEN;
		}else if(source == blueButton){
			color = Color.BLUE;
		}
		
		setBackground(color);
		repaint();
	}
}