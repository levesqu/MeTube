/*
   Nathan Jones
   2/23/16
   Simple class for describing a light. Contains a position, color
   and direction, as well as a flag for describing light type
*/
#include "myVector.h"

#ifndef LIGHT_H
#define LIGHT_H

class light {
   protected:
      myVector pos, color, dir;
   
   public:
      bool isDir;
      light() : pos{}, color(myVector(1,1,1)), dir {}, isDir{0} {}
      light(myVector p, myVector c, bool id) : color(c) {
         isDir=id;
         if (id==1)
            dir=p;
         else
            pos=p;
      }
      myVector getPos() {return pos;}
      myVector getColor() {return color;}
      myVector getDir() {return dir;}
      void setPos(myVector p) {pos=p;}
      void setColor(myVector c) {color=c;}
      void setDir(myVector d) {dir=d;}
      void set(myVector p, myVector c, bool id) {
         isDir=id;
         if (id==1)
            dir=p; 
         else
            pos=p;
         color=c;
      }
};

#endif
