/*
   Nathan Jones
   2/3/16
   Simple class for containing a ray for raycasting
   with a vector (point of origin) and a vector (direction)
   Direction vector is unitized upon creation of the ray
*/
#include "myVector.h"
#ifndef RAY_H
#define RAY_H

class ray {
   protected:
      myVector p, dir;
   public:
      ray() : p{}, dir{} {};
      ray(myVector point, myVector direction) : p(point), dir(direction) {dir.unit();}
      myVector getP() {return p;}
      myVector getDir() {return dir;}
      void setP(myVector point) {p=point;}
      void setDir(myVector direction) {dir=direction;}
};
#endif
