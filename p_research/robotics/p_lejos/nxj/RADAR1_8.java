/**
 * RADAR CLASS SERIES
 * Author: Juan Antonio Breña Moral
 * Email: bren[at]juanantonio.info
 * Web: http://www.juanantonio.info
 * Date of Creation: 2007/04/01
 * Last Update: 2007/04/13
 * 
 * Description:
 * This class has been created to emulate a real radar using NXT technology.
 * This class is designed to be run into a static bot with the following
 * sensors:
 * 
 * + Ultrasonic Sensor to measure distances
 * + Hitechnic Compass Sensor to know the measure's degree
 * + NXT Motor to turn the platform
 * 
 * I have used a very useful information stored into the following Web Site:
 * http://home.earthlink.net/~xaos69/NXT/Radar_Display/Radar_Display.htm
 */

//Import NXJ Packages 
import java.util.*;
import lejos.nxt.*;
import javax.microedition.lcdui.Graphics;

public class RADAR1_8 {
	//It is used to have memory the radar;
	static int degreesOld[];
	//It is used to detect patterns
	static boolean degreesChanges[];
	//It is used to store where system detects patterns
	static boolean degreesDetections[];
	
	//Information about NXT brick LCD
	static int XCENTER = 50;
	static int YCENTER = 32;
	
	//When robot start to store historical information about the enviroment,
	//It is necessary to know when it should to stop. It is very difficult to know
	//360 distances very fast.
	static int STOP_FACTOR = 50;
	
	static CompassSensor compassObj;
	static UltrasonicSensor usObj;
	static Motor gyroscopeMotorObj;
	static Graphics gObj;	
	
	/**
	 * Get X Coordenate
	 *
	 * param  angle  Angle given by Compass Sensor
	 * param  distance  Distance given by Ultrasonic Sensor
	 * return X coordenate in radius
	 */	
	private static int getCoordenateX(int angle,int distance){
		double CX;
		CX = distance * Math.sin(angle * (Math.PI/180));
		return Math.round((float) CX);
    }
    
	/**
	 * Get Y Coordenate
	 *
	 * param  angle  Angle given by Compass Sensor
	 * param  distance  Distance given by Ultrasonic Sensor
	 * return X coordenate in radius
	 */	
	private static int getCoordenateY(int angle,int distance){
		double CY;	
		CY = distance * Math.cos(angle * (Math.PI/180));
		return Math.round((float) CY);
    }
    
	/**
	 *	Method designed to move Robot to degree 0. This method is very useful to
	 *	Know how to understand the graphic developed with historical information
	 *  about distances
	 *
	 */
    public static void moveToDegreeCero(){
    	boolean isNearToCero = false;
    	
    	gyroscopeMotorObj.forward();
    	while(!isNearToCero){    		
    		int degree;
    		degree = (int) compassObj.getDegreesCartesian();

    		if((degree >=355) || (degree <= 5)){
    			break;
    		}
    	}
    	gyroscopeMotorObj.stop();
    }

	/**
	 *	Detect if the historical degree Array has gaps in the array
	 *
	 */    
    private int existEmptyDegrees()throws Exception{
		int bl_finished;
		bl_finished = 0;
		
		int counter;
		counter = 0;
    	
		//Check if all degrees has distances
		for(int i=1; i<= 360;i++){
			if(degreesOld[i] == 0){
				counter++;
			}
		}
		
		//Show counter
		LCD.clear();
		LCD.drawInt(counter,0,7);
		LCD.refresh();		
		
		//Factor to stop
		if(counter <= STOP_FACTOR){
			bl_finished = 1;
		}		
		return bl_finished;
    }
    
	/**
	 *	This methods has been designed to calculate values on degrees without any distance.
	 *	If the method finds any gap between 2 degrees, this method, calculates the mean.
	 *
	 *  D1 D2 D3
	 *  30 ?  40
	 *  D2 = (30+40)/2
	 *
	 *	This method is not perfect because the array can have the following structure:
	 *
	 *	D1 D2 D3 D4 D5 D6 D7 D8  D9
	 *	30 ?  ?  40 45 ?  ?  255 255
	 *
	 *  see knowEnviroment
	 *  see fillGapsWithPatterns
	 *
	 */      
    private void fillGapsWithMeans(){
    	int previousIndex;
    	int nextIndex;
    	previousIndex = 0;
    	nextIndex = 0;
    	
    	float mean;
    	
		for(int i=1; i<= 360;i++){
			if(degreesOld[i] == 0){
				previousIndex = i-1;
				nextIndex = i+1;
				
				if(i == 1){
					previousIndex = 360;
				}else if(i == 360){
					nextIndex = 1;				
				}
				
				//Calculate mean
				if((degreesOld[previousIndex] != 0) && (degreesOld[nextIndex] != 0)){
					mean =  ((degreesOld[previousIndex] + degreesOld[nextIndex]) / 2);
					if(Math.round(mean) != 0){
						degreesOld[i] = Math.round(mean);
					}
				}
			}
		}   	
    }
    
	/**
	 *  This method tries to solve the problem in the previous method, fillGapsWithMeans
	 *  
	 *	D1 D2 D3 D4 D5 D6 D7 D8  D9
	 *	30 ?  ?  40 45 ?  ?  255 255
	 *
	 *  see knowEnviroment
	 *  see fillGapsWithMeans
	 *  
	 */    
    private void fillGapsWithPatterns(){
    	int j;
    	int k;
    	int absoluteDiff;
    	absoluteDiff = 0;
    	float mean;

		for(int i=1; i<= 360;i++){
			//First loop discover gap
			if(degreesOld[i] == 0){
				for(j = i;j<=360;j++){
					if(degreesOld[j] != 0){
						absoluteDiff = Math.abs(degreesOld[i] - degreesOld[j]);
						if(absoluteDiff <= 20){
							for(k = i;i<j;k++){
								//Calculate mean
								mean = ((degreesOld[i] + degreesOld[j]) / 2);
								if(Math.round(mean) != 0){
									degreesOld[k] = Math.round(mean);
								}								
							}
							break;
						}
					}
				}
			}
		}     	
    }
    
	/**
     * Method created to store historical information about the place where bot is located
     * This method has to store information about all degrees, 360 degreess
     * 
	 *  see fillGapsWithMeans
	 *  see fillGapsWithPatterns
	 */      
    public void knowEnviroment() throws Exception{
		int degree = 0;
		int distance = 0;
		
		gyroscopeMotorObj.forward();
		while(existEmptyDegrees() == 0){
			distance = usObj.getDistance();
			degree = (int) compassObj.getDegreesCartesian();

			//Defensive Code
			if(degree <=360){
				//The system allows to update the measure in 2 cases:
				//If the array value is 0 or 255 (Limit / Error in i2c Sensor)
				if((degreesOld[degree] == 0) || (degreesOld[degree] == 255)){
					degreesOld[degree] = distance;
				}
			}			
		}
		gyroscopeMotorObj.stop();
		
		//Private methods used to fill the gaps 
		fillGapsWithMeans();
		//fillGapsWithPatterns();
    }

    
	/**
     * Init Distance Array with 0
     * 
	 */ 
    public void deleteHistoricalInformation(){
		for(int i=1;i<=360;i++){
			degreesOld[i] = 0;
		}
    }

	/**
	 *	Draw a Radar Interface
	 *
	 */	
	private static void drawBackground(){
		gObj.clear();
		gObj.drawArc(50-10, 32-10, 20,20,0,360);
		gObj.drawArc(50-20, 32-20, 40,40,0,360);
		gObj.drawArc(50-30, 32-30, 60,60,0,360);
		
		//X Axis
		for(int i=15;i<=85;i++){
			gObj.setPixel(1,i,YCENTER);
		}

		//Y Axis
		for(int j=0;j<=64;j++){
			gObj.setPixel(1,XCENTER,j);
		}
		gObj.refresh();
	}    

	/**
	 *	This method is used to show map using the information stored.
	 *
	 */
    static  void showMap(){
		int X = 0;
		int Y = 0;
		int X2 = 0;
		int Y2 = 0;
		boolean EXIST;
		
		for(int i=1;i<=360;i++){
			EXIST = false;
			if(degreesOld[i] != 0){
				X = getCoordenateX(i,degreesOld[i]);
				Y = getCoordenateY(i,degreesOld[i]);

				//Buscar punto 2
				int j = i;
				j++;
				
				try{
					if(j <360){
						for(int z= j;j<=360;z++){
							if(degreesOld[z] != 0){
								X2 = getCoordenateX(z,degreesOld[z]);
								Y2 = getCoordenateY(z,degreesOld[z]);
								EXIST = true;
								break;
							}
						}
					}
					if(EXIST){
						gObj.drawLine(XCENTER+X,YCENTER+Y,XCENTER+X2,YCENTER+Y2);
					}
				}catch(Exception e){
					
				}
				gObj.refresh();
			}
		}
		
		int memory;
		int batteryLife;
		batteryLife = Battery.getVoltageMilliVolt();
		memory = (int)(Runtime.getRuntime().freeMemory());
		LCD.drawInt(batteryLife,0,6);
		LCD.drawInt(memory,0,7);
		LCD.refresh();
	}
	
	
	/**
     * This method draw in NXT LCD Radar Background. After, this method execute
     * showMap method to show the shape of the enviroment where the robot has been
     * placed
     * 
	 */     
    public void showEnviroment(){
		drawBackground();
		showMap();   	
    }

	/**
     * This method detect changes in relation to historical information.
     * 
	 */     
    public void detectChanges()throws Exception{
		int degree;
		int distance;
		int X;
		int Y;
		
		int absolutDiff;
		absolutDiff = 0;

		distance = usObj.getDistance();
		degree = (int) compassObj.getDegreesCartesian();
		
		if(distance == 255){
			//Error in measuring or Detect Limit
			if(degreesOld[degree] == distance){
				//Detect boundary
			}
		}else{
			//System detect a boundary or error measure case
			if(degreesOld[degree] == 255){
				//Error Measure Detection
				if(distance < degreesOld[degree]){
					//Update historical information
					degreesOld[degree] = distance;
				}
			}else{
				//If the current distance is greather than historical information
				if(degreesOld[degree] > distance){
					absolutDiff = Math.abs(degreesOld[degree] - distance);
					//System Detect a significative difference
					if(absolutDiff >= 5){
						//Sound.playTone(50, 200);
						degreesChanges[degree] = true;
			
					}
				}

				//Update historical information
				degreesOld[degree] = distance;
			}
		}
    }
    
    public boolean detectPattern()  throws Exception{
    	boolean detected;
    	detected = false;
    	
    	int acumulator;
    	acumulator = 0;
    	int start;
    	start = 0;
    	int end;
    	end = 0;
    	int X, Y;
    	X = 0;
    	Y = 0;
    	int j;
    	j=0;
    	int k;
    	k = 0;
    	
    	for(int i=1;i<= 360;i++){
    		k  = i + 15;
			if(k <= 360){
				start = i;//1
				end = i+14;//15
				
				//Look over 15 elements to know similitudes
				for(j=start;j<=end;j++){
					if(degreesChanges[j] == true){
						acumulator ++;
					}
				}
				
				//If system, detect a pattern draw a circle
				if(acumulator >= 7){
					//Sound.playTone(50, 200);

					degreesDetections[i] = true;

					//If system detect a pattern, jump to the following item
					i = end+1;
					detected = true;
				}
				
				//Reset
				acumulator=0;
			}    		
    	}

    	//Reset pattern array
 	   for(int i=1;i<=360;i++){
		   degreesChanges[i] = false;
	   }
 	   
 	   return detected;
    }
    
    public void showDetections(){
    	int X,Y;
    	X = 0;
    	Y = 0;
    	
		for(int i=1;i<=360;i++){
			if(degreesDetections[i] == true){
				X = getCoordenateX(i,degreesOld[i]);
				Y = getCoordenateY(i,degreesOld[i]);
				
				//Draw Circles
				gObj.drawArc(XCENTER-X,YCENTER-Y,5,5,0,360);
				gObj.refresh();  
			}
		} 
		
    	//Reset pattern array
 	   for(int i=1;i<=360;i++){
 		  degreesDetections[i] = false;
	   }	
    }

	/**
	 *	Radar Class Constructor.
	 *
	 */
	public RADAR1_8(CompassSensor compassObj2,UltrasonicSensor usObj2,Motor gyroscopeMotorObj2,Graphics gObj2) throws Exception{
	   //Instances
	   compassObj = compassObj2;
	   usObj = usObj2;
	   gyroscopeMotorObj = gyroscopeMotorObj2;
	   gObj = gObj2;
	   
	   //Array object designed to store information about the distances where
	   //The bot is placed
	   degreesOld = new int[361];
	   degreesChanges = new boolean[361];
	   degreesDetections = new boolean[361];
		
	   //Init Array where Radar Class will store the measures
	   for(int i=1;i<=360;i++){
		   degreesOld[i] = 0;
		   degreesChanges[i] = false;
		   degreesDetections[i] = false;
	   }
	}
}