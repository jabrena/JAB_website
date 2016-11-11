import processing.core.*; import processing.video.*; import java.applet.*; import java.awt.*; import java.awt.image.*; import java.awt.event.*; import java.io.*; import java.net.*; import java.text.*; import java.util.*; import java.util.zip.*; import javax.sound.midi.*; import javax.sound.midi.spi.*; import javax.sound.sampled.*; import javax.sound.sampled.spi.*; import java.util.regex.*; import javax.xml.parsers.*; import javax.xml.transform.*; import javax.xml.transform.dom.*; import javax.xml.transform.sax.*; import javax.xml.transform.stream.*; import org.xml.sax.*; import org.xml.sax.ext.*; import org.xml.sax.helpers.*; public class _3 extends PApplet {/*
Meander

Date:         2008.03.30
Author:       P.J. Onori

Description:  Modified Processing sketch from Robert Hodgin's Noise Drive (http://flight404.com/p5/noiseDrive2a/).
              Much of code has changed from Robert's original work, but much of the underlying logic still remains.
              Now is a good time to thank Robert for offering up his code for public consumption... :)
*/



MovieMaker mm;

float signature = (random(100));

int xSize = 720;
int ySize = 400;

float xAnchor = xSize/2+random(-xSize/4, xSize/4);
float yAnchor = ySize/2+random(-ySize/4, ySize/4);

Meanderer[] meanderers;

int total = PApplet.parseInt(random(40, 80));
int delayInterval = PApplet.parseInt(random(3, 15));
int pushCount = 0;

boolean capture = false;
  
public void setup(){
  size(xSize,ySize);
  frameRate(30);
  smooth();
  noFill();
  background(255);
   
  meanderers = new Meanderer[total];
  if(capture) mm = new MovieMaker(this, width, height, signature+"drawing.mov",30, MovieMaker.VIDEO, MovieMaker.BEST);
}

public void draw() {

  if(frameCount%delayInterval==1&&pushCount!=total-1||frameCount==0)
  {
    meanderers[pushCount] = new Meanderer(xAnchor, yAnchor);
    pushCount++;
  }
  
  for(int i=0; i<pushCount; i++) meanderers[i].update();
  if(capture) mm.addFrame();
}


public void keyPressed(){
   if(capture) 
   { 
    saveFrame(signature+"filename-####.png");
    mm.finish();
   }
    exit();
}

class Meanderer 
{
  int count, seed, d1, toggle, baseAngle;
  float x, y, xSpeed, ySpeed, theta, angle, speed, d2, noiseScale, noiseCount, noiseSpeed, xCount, yCount, angleMultiplier, noiseVal, noiseCompoundX, noiseCompoundY;

  Meanderer (float xPos, float yPos)
  {
    toggle = (random(-1,1)<0) ?-1:1;
    speed = random(.4f, 2.5f)*toggle;
    count=0;
    seed = PApplet.parseInt(random(200,1000));
    d1 = PApplet.parseInt(random(4,9));
    d2 = random(.2f,.4f);
    noiseScale=random(.01f,.03f);
    noiseCount=0;
    noiseSpeed=random(.001f, .035f);
    xCount=PApplet.parseInt(random(-10, 10));
    yCount=PApplet.parseInt(random(-10, 10));
    angleMultiplier = random(.3f,.9f);
    baseAngle = PApplet.parseInt(random(2,4))*360;
    noiseCompoundX=random(.1f,.3f);
    noiseCompoundY=random(.1f,.3f);
   
    x = xPos;
    y = yPos;
  }
  
  public void update()
  {
    noiseDetail(d1, d2);
    noiseSeed(seed);
    noiseVal=noise((x-xCount)*noiseScale, (y-yCount)*noiseScale, noiseCount);
    
    angle -= (angle - noiseVal*baseAngle)*angleMultiplier;
    theta = -(angle * PI)/180;
    xSpeed = cos(theta)*speed;
    ySpeed = sin(theta)*speed;
    
    x -= xSpeed;
    y -= ySpeed;
    
    float avgSpeed = (xSpeed+ySpeed)/2;
    stroke(0,35/speed);
    ellipse(x,y,40*avgSpeed,40*avgSpeed);
    
    noiseCount+=noiseSpeed;
    xCount+=noiseCompoundX;
    yCount+=noiseCompoundY;
    count++;
  }
}

  static public void main(String args[]) {     PApplet.main(new String[] { "_3" });  }}