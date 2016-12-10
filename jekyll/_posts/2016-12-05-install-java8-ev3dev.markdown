---
layout: post
title:  "Install Java 8 from Scratch on a EV3 Brick with EV3Dev"
date:   2016-12-05 00:00:00 +0000
categories: blog
tags: java ev3dev
---

To install Java 8 on a EV3 Brick with EV3Dev, follow the steps.

**Download Java 8 jre from Oracle:**

[http://www.oracle.com/technetwork/java/embedded/downloads/javase/javaseemeddedev3-1982511.html](http://www.oracle.com/technetwork/java/embedded/downloads/javase/javaseemeddedev3-1982511.html)

**Copy the zip from your laptop to your brick:**

{% highlight shell %}
scp ejdk-8-fcs-b132-linux-arm-sflt-03_mar_2014.gz robot@EV3_IP:/home/robot/
sudo tar zxvf ejdk-8-fcs-b132-linux-arm-sflt-03_mar_2014.gz -C /opt
sudo update-alternatives --install /usr/bin/java java /opt/ejdk1.8.0/linux_arm_sflt/jre/bin/java 1
java -version
{% endhighlight %}

After the installation, you should have the following result:

{% highlight shell %}
robot@ev3dev:~$ java -version
java version "1.8.0"
Java(TM) SE Embedded Runtime Environment (build 1.8.0-b132, headless)
Java HotSpot(TM) Embedded Client VM (build 25.0-b70, mixed mode)
{% endhighlight %}