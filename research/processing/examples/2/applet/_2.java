import processing.core.*; import java.applet.*; import java.awt.*; import java.awt.image.*; import java.awt.event.*; import java.io.*; import java.net.*; import java.text.*; import java.util.*; import java.util.zip.*; import javax.sound.midi.*; import javax.sound.midi.spi.*; import javax.sound.sampled.*; import javax.sound.sampled.spi.*; import java.util.regex.*; import javax.xml.parsers.*; import javax.xml.transform.*; import javax.xml.transform.dom.*; import javax.xml.transform.sax.*; import javax.xml.transform.stream.*; import org.xml.sax.*; import org.xml.sax.ext.*; import org.xml.sax.helpers.*; public class _2 extends PApplet {public void setup(){
  size(720,400);
  smooth();
  noFill();
  strokeWeight(1);
  render();
}

public void draw(){}
public void keyPressed() {
  switch(key){
  case '+': strokeWeight(g.strokeWeight+1);break;
  case '-': strokeWeight(max(g.strokeWeight-1,0));break;
  }
  render();
}
public void render(){
  background(255);
  for(int i=0; i< 55; i++){
    for(int j=0; j < 55; j++){
      pushMatrix();
      translate(i*20, j*20);
      if(random(3)>1){
        arc(0, 0, 20, 20, 0, PI/2);
        arc(20, 20, 20, 20,PI, TWO_PI-PI/2);
      }
      else{
        arc(20, 0, 20, 20, PI/2, PI);
        arc(0, 20, 20, 20, TWO_PI-PI/2, TWO_PI);
      }
      popMatrix();
    }
  }
}

  static public void main(String args[]) {     PApplet.main(new String[] { "_2" });  }}