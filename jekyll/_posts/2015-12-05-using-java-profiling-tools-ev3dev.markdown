---
layout: post
title:  "Using Java profiling tools for Java processes running on EV3Dev"
date:   2015-12-05 10:00:00 +0000
categories: blog
tags: java ev3dev visualvm
---

the idea is the connection from Mac/Win/Linux to EV3Dev to monitor the execution of processes running in the JVM.

[https://visualvm.java.net/](https://visualvm.java.net/)

{% highlight shell %}
java 
-Dcom.sun.management.jmxremote=true 
-Dcom.sun.management.jmxremote.ssl=false 
-Dcom.sun.management.jmxremote.authenticate=false 
-Dcom.sun.management.jmxremote.port=7091 
-Djava.rmi.server.hostname=192.168.2.2 
-Djava.library.path=/usr/lib/jni/ 
-cp benchmark1-1.0-SNAPSHOT.jar:/usr/share/OpenCV/java/opencv-249.jar 
ev3dev.opencv.benchmark.OpenCVTest &
{% endhighlight %}

{% highlight shell %}
ssh -v -D 9696 root@192.168.2.2
{% endhighlight %}
