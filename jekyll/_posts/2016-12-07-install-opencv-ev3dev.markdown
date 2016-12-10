---
layout: post
title:  "Install for OpenCV for Java on a EV3 Brick with EV3Dev"
date:   2016-12-07 19:24:09 +0000
categories: blog
tags: java ev3dev opencv
---

[https://packages.debian.org/jessie/libopencv2.4-java](https://packages.debian.org/jessie/libopencv2.4-java)

{% highlight shell %}
sudo apt-get install libopencv2.4-java
{% endhighlight %}

{% highlight shell %}
find / -name "libopencv_java249.so"
/usr/lib/jni/libopencv_java249.so
root@ev3dev:/home# java -Djava.library.path=/usr/lib/jni/ -cp HelloCV2.jar:/usr/share/OpenCV/java/opencv-249.jar Main
Welcome to OpenCV 2.4.9.1
/usr/lib/jni/
m = [1, 0, 0;
  0, 1, 0;
  0, 0, 1]
{% endhighlight %}