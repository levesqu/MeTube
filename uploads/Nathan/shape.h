/*
   Nathan Jones
   2/3/16
   Simple generic parent class of all possible shapes
*/
#include "myVector.h"
#ifndef SHAPE_H
#define SHAPE_H

class shape {
   protected:
      int id;
      myVector color;
   public:
      shape() : id{0}, color(myVector(0,0,0)) {}
      shape(int i, myVector c) : id(i), color(c) {}
      int getId() {return id;}
      myVector getColor() {return color;}
      void setId(int i) {id=i;}
      void setColor(myVector c) {color=c;}
};
#endif
