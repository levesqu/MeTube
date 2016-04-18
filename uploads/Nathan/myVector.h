/*
   Nathan Jones
   2/3/16
   Class for containing a simple vector including dot products
   and unitizing a vector as well as a few overloaded operators
*/
#include <iostream>
#include <cmath>
#ifndef MYVECTOR_H
#define MYVECTOR_H

class myVector {
   protected:
      float x, y, z;
   public:
      myVector() : x{0}, y{0}, z{0} {}
      myVector(float a, float b, float c) : x(a), y(b), z(c) {}
      void setX(float a) {x=a;}
      void setY(float b) {y=b;}
      void setZ(float c) {z=c;}
      void set(float a, float b, float c) {x=a; y=b; z=c;}
      float getX() {return x;}
      float getY() {return y;}
      float getZ() {return z;}
      void operator=(const myVector other) {
         this->x=other.x;
         this->y=other.y;
         this->z=other.z;
      }
      myVector operator+(const myVector other) {
         myVector a;
         a.x=this->x+other.x;
         a.y=this->y+other.y;
         a.z=this->z+other.z;
         return a;
      }
      myVector operator*(float scale) {
         myVector a;
         a.x=this->x*scale;
         a.y=this->y*scale;
         a.z=this->z*scale;
         return a;
      }
      myVector cross(myVector other)
      {
         myVector ret;
         ret.setX(y*other.getZ()-z*other.getY());
         ret.setY(z*other.getX()-x*other.getZ());
         ret.setZ(x*other.getY()-y*other.getX());
         return ret;
      }
      float size() {return sqrt(x*x+y*y+z*z);}
      void unit() {*this=*this*(1/this->size());}
      float dot(const myVector other)
      {return this->x*other.x+this->y*other.y+this->z*other.z;}
};      
#endif
