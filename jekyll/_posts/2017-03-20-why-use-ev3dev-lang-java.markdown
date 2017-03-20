---
layout: post
title:  "Why EV3Dev-lang-java on EV3 Brick?"
date:   2017-03-20 00:00:00 +0000
categories: blog
tags: java
---

Some Java developers on Mindstorms ecosystem and other developers using other technologies see with curiosity a small project named [EV3Dev-lang-java](http://ev3dev-lang-java.github.io/) and I suppose that they have the classic question: **What is EV3Dev-lang-java?** using this article, I will try to clarify it.

**EV3Dev-lang-java is an Open Source project to develop a set of modular libraries to build and develop educatinal Robots with Java on Lego Mindstorms ecosystem on the top of EV3Dev.**

If you read the definition, maybe the answer could generate new additional questions about the nature and vision of the project like:

- Why another Java Library if I use [LeJOS](http://www.lejos.org/)?
- Why develop Java on EV3Dev?

So, I will explain in detail both questions.

## Why another Java Library?

If you build robots with Lego mindstorms from several years, you will notice that `LeJOS is amazing`, it covers many aspects that other solutions don`t offer. 

The main features of LeJOS in my opinion are:

+ Support for [Sensors/Actuators](http://www.lejos.org/ev3/docs/lejos/hardware/sensor/package-summary.html) for the whole Mindstorms ecosystem.
+ [Local navigation support](http://www.lejos.org/ev3/docs/lejos/robotics/navigation/package-summary.html)
+ [Remote support](http://www.lejos.org/ev3/docs/lejos/remote/ev3/package-summary.html) (EV3-EV3, EV3-NXT, EV3-RCX, EV3-PC & EV3-Android)

If you compare every point with the features included with [EV3Dev-lang-java](http://ev3dev-lang-java.github.io/), [RobotC](http://www.robotc.net/) or [EV3Dev-lang-python](https://github.com/rhempel/ev3dev-lang-python) you could think that Juan Antonio is Crazy, why that guy start coding from scratch when he could use the solution out of box and run the programs in a pair of hours after reading some tutorial?

In my case, the arguments that I have are:

1. Java experience
- What happen with the concept of FatJar?
- Why doesn´t exist any example with Maven/Gradle?
2. Linux, libraries & Runtime
- How to use USB Devices?
- How to use native libraries? 
3. The LeJOS Monolith
- Is not possible to do Remoting with other technology than RMI?
- Coupled design?

### The Java experience

If I have memory, I was studying in the University a MSc Industrial Engineering (The second engineering) when I discovered Lego Mindstorms RCX (I suppose that Googling). In that age, I wanted to learn Java and Mindstorms Bricks was a nice way to learn Java.

![](../../../../Images/lego-mindstorms-rcx-kit.jpg)

After reading some excellent [tutorials](http://www.lejos.org/rcx/tutorial/index.html), the [Javadocs](http://www.lejos.org/rcx/api/index.html) and [the first book from Brian Bagnall about LeJOS](https://www.amazon.com/Core-LEGO-MINDSTORMS-Programming-Platform/dp/0130093645/ref=asap_bc?ie=UTF8) I built my first robots with Java but the IR Tower was a nightmire and I didn´t like to recharge the batteries with every session. Fortunatelly soon appeared Lego Mindstomrs NXT and the experience improved so much. A new mindstorms with a Rechargeable battery, more internal memory and a big API with new features like a decent Garbage Collector (Big contribution from [Andy Shaw](http://www.gloomy-place.com/legoindex.htm)), Bluetooth comms, Sensor Framework, Local navigation features, Remoting & [ROS for NXT](http://wiki.ros.org/nxt_lejos). 

`If you compare the Generation 1 & 2 (RCX and NXT), both Bricks used microcontroller boards and the LeJOS environment used multiple tricks to compile and run bytecodes with multiple limitations but at the end, the hardware was not able to run a full featured JVM.`

After some years playing with NXT, appeared in 2013 the third generation, Lego Mindstorms EV3. This version incorpored a nice UX running inside of a Linux system and it has 300 Mhz in compare with 48 Mhz from the old NXT. After some months of hard work from Andy, the whole LeJOS community had a solution to use a EV3 Brick with LeJOS.

[VIDEO: A first look at Java and leJOS on the Lego Mindstorms EV3](https://www.youtube.com/watch?v=luTdnyIElWU)

After some months, using LeJOS with EV3 I observed that LeJOS doesn´t use a real Linux distro, because LeJOS for EV3 uses a [Busybox](https://www.busybox.net/about.html). which *combines tiny versions of many common UNIX utilities into a single small executable. It provides replacements for most of the utilities you usually find in GNU fileutils, shellutils, etc. The utilities in BusyBox generally have fewer options than their full-featured GNU cousins;* and maybe `this is the big mistake on the architecture of LeJOS for EV3`. Anyway, we don´t have more alternatives in 2013. 

With the time, I had the feeling that we are copying the same ideas from RCX & NXT but in this case on a EV3, a hardware with the possibility to run a full featured Linux distro and this fact doesn´t like. I dreamed that the developer could interact with a terminal, compile the jar or execute a fatjar but if you observe, LeJOS environment includes ev3classes.jar in the environment and my question is why is it necessary? If you observe when you install opencv or rxtx for java:

```
sudo apt-get install libopencv2.4-java
sudo apt-get install librxtx-java
```

The shared libraries was installed on this path:

```
robot@ev3dev:~$ ls /usr/lib/jni/
libopencv_java249.so   librxtxI2C.so               librxtxParallel.so       librxtxRS485.so        librxtxRaw.so             librxtxSerial.so
librxtxI2C-2.2pre1.so  librxtxParallel-2.2pre1.so  librxtxRS485-2.2pre1.so  librxtxRaw-2.2pre1.so  librxtxSerial-2.2pre1.so
```

but you could generate a fatjar and make a reference for the native library like OpenCV or RXTX:

```
root@ev3dev:/home# java -Djava.library.path=/usr/lib/jni/ -cp HelloCV2.jar:/usr/share/OpenCV/java/opencv-249.jar Main
Welcome to OpenCV 2.4.9.1
/usr/lib/jni/
m = [1, 0, 0;
  0, 1, 0;
  0, 0, 1]
```

This solution could be followed by LeJOS but in this case, ev3classes.jar is located by default in the Busybox environment. If you observe the enterprise market, current applications are deployed on Docker containers in a isolated way using fatjars generated by CI environments like Jenkins Pipelines. 
I think that it is necessary not mix java artifacts with environment.

`I think that it is a bit extrange that in 2017, we don´t have any Maven release about LeJOS.` 

**Conclussions about this area:**

+ With EV3 Generation, it is possible to touch javac, java or other JDK tool without any layer hidding details. It is possible to have the same Java experience that you have with your Personal laptop on Windows, Linux or OSX.
+ It is necessary to release Java artifacts on Maven repositories
+ It is necessary to not mix layers

### Linux, libraries & runtime

In 2014, In the LeJOS forum, I participated in [a discussion](https://lejos.sourceforge.io/forum/viewtopic.php?f=18&t=7438&hilit=ev3dev) about [EV3Dev](http://www.ev3dev.org/) because I observed that it could be possible to run Java programs for Robots on EV3 with a real Linux OS but the idea was refused several times. If you observe, with Busybox is not possible to use USB devices in a easy way like [RPLidarA1](http://www.slamtec.com/en/Lidar) without any specific change in the kernel but at least, we have camera support. `In general the feeling is a environment limited and closed.` 

![](../../../../Images/usb-devices.png)

**Conclussions about this area:**

+ Why export LeJOS runtime & ev3classes.jar to a Linux package like opencv or rxtx?
+ Why not combine different languages or tinker with Linux?

### The LeJOS Monolith

If you review previous paragraphs, I consider that LeJOS project has unique features but maybe the time to market is quite slow in compare with other projects so, maybe we have a problem.

![](../../../../Images/theMonolith.png)

In my opinion, the whole API could be organized in the following libraries:

+ LeJOS-Core
+ LeJOS-Commons
+ LeJOS-Navigation
+ LeJOS-Remoting
+ LeJOS-ROS

But at the momement, everything is stored in the same library and it doesn´t have any version control on a Maven repository. Maybe we have a Waterfall problem and the Design is a bit coupled.

![](../../../../Images/agile.png)

**Conclussions about this area:**

+ How to implement another remoting approach with LeJOS?
+ With a modular library, the time to market could decrease

## Why develop Java on EV3Dev?

The reasons to play Java on EV3Dev to build robots are:

+ The support of EV3Dev
+ The Three `amigos`
+ The power of Raspberry Pi 3
+ Java 9
+ Technology integration

### The support of EV3Dev

The group of people collaborating on EV3Dev and the ecosystem is fantastic. Normally when I have some doubt, it is rare if the answer is not replied in few days.

Take a look [the backlog of this repo](https://github.com/ev3dev/ev3dev/issues) to see the activity.

### The Three `amigos`

With EV3Dev, it is possible to unify the runtime for an EV3 Brick, BrickPi+ & PiStorms V2 (BrickPi 3 is coming)

![](../../../../Images/theThreeAmigos.png)

So, why not write a unique Java program which it run every device?

### The power of Raspberry Pi 3

Execute an example with BrickPi+ or PiStorms V2 is quite fast with any Raspberry Pi version in compare with the same execution on a EV3 Brick but if you mount the BrickPi+/PiStormsV2 on a Raspi 3, the process jump to another level.

### Java 9.

Using EV3Dev, you can install JDK & JRE from Debian repositories. At the moment OpenJDK 9 is not easy to install, but is possible and I tested EV3Dev-lang-java without any problem.

![](../../../../Images/java9.png)

### Technology integration

Do you remember some case when you would like to test some feature in Java but in github only find repos with solution on Python, Node.js or R? Don´t worry, with EV3Dev, you can install that environments and integrate that libraries with Java. It is not perfect but it could be the first iteration. :)

## Final words

I created EV3Dev-lang-java because I felt a bit restricted with current LeJOS approach. Now with current execution environment, I can write and execute the programs for robots `in the exact way` than I execute in my laptop but it is true that some lost some LeJOS features but little by little, I will add by demand in different libraries to not create another Monolith.

+ LeJOS-Core, https://github.com/ev3dev-lang-java/ev3dev-lang-java
+ LeJOS-Commons, https://github.com/ev3dev-lang-java/lejos-commons
+ LeJOS-Navigation (Once I fix the issue about Motor syncronization)
+ LeJOS-Remoting
+ LeJOS-ROS

Besides, I would like to remember in this article that many people use the bricks in the same way than in [RCX ages](http://www.lejos.org/rcx/api/index.html)...

![](../../../../Images/rcx.png)

But modern Java development begin importing a dependency from a Maven repo:

```java
<dependency>
    <groupId>com.github.ev3dev-lang-java</groupId>
    <artifactId>ev3dev-lang-java</artifactId>
    <version>v0.4.0</version>
</dependency>
``` 

Further information: [http://ev3dev-lang-java.github.io/#/](http://ev3dev-lang-java.github.io/#/)

**Note:** If you liked the article or if you would like to discuss some point, please add some issue on this [backlog](https://github.com/ev3dev-lang-java/ev3dev-lang-java/issues) or continue the [LeJOS discussion thread](https://lejos.sourceforge.io/forum/viewtopic.php?f=18&t=7438&hilit=ev3dev)

Cheers

Juan Antonio Breña Moral







