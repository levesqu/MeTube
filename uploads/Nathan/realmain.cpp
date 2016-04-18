/*
   Nathan Jones
   2/3/16
   Creates all spheres in the scene, puts them into a list
   creates a camera, and passes the list to the camera, in addition
   to a flag for whether the camera is orthographic (1)
   or perspective (0)
   Usage: ./a.out
*/
#include <iostream>
#include "sphere.h"
#include "ray.h"
#include "camera.h"
using namespace std;

int main(int argc, char** argv)
{
   sphere a[11];
   a[0].set(myVector(0,0,10),2.5, 0, myVector(1,1,0));
   a[1].set(myVector(0,0,7.5),.5, 1, myVector(0,0,1));
   a[2].set(myVector(-.8,-.8,7.7),.3, 2, myVector(1,1,1));
   a[3].set(myVector(.8,-.8,7.7),.3, 3, myVector(1,1,1));
   a[4].set(myVector(0,1,7.7),.25, 4, myVector(1,0,0));
   a[5].set(myVector(-.25,1,7.7),.25, 5, myVector(1,0,0));
   a[6].set(myVector(.25,1,7.7),.25, 6, myVector(1,0,0));
   a[7].set(myVector(-.5,.9,7.7),.25, 7, myVector(1,0,0));
   a[8].set(myVector(.5,.9,7.7),.25, 8, myVector(1,0,0));
   a[9].set(myVector(-.75,.8,7.7),.25, 9, myVector(1,0,0));
   a[10].set(myVector(.75,.8,7.7),.25, 10, myVector(1,0,0));
   node *n=NULL;
   for (int i=0;i<11;i++) {n=new node(&a[i],n);}
   camera cam(n,11);
   cam.writeImage(1920,1080,1);
   cam.writeImage(1920,1080,0);
}
