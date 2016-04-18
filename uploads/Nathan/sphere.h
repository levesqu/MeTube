/*
   Nathan Jones
   2/3/16
   Sphere class to define a sphere
   Contains code for calculating whether or not a sphere was hit
   as well as returning the distance to the hit in a passed in variable
*/
#include "shape.h"
#include "ray.h"
#ifndef SPHERE_H
#define SPHERE_H

class sphere : public shape{
   protected:
      myVector center;
      double radius;
   public:
      sphere() : center(), radius{0.0} {}
      sphere(myVector c, double r, int i, myVector col) : shape(i,col), center(c), radius(r) {}
      void set(myVector c, double r, int i, myVector col) {
         center=c;
         radius=r;
         this->setId(i);
         this->setColor(col);
      }
      bool intersection(ray test, double& t) {
         myVector p=test.getP();
         myVector dir=test.getDir();
         myVector c=center*-1;
         double det=pow(dir.dot(p+c),2)-pow((p+c).size(),2)+pow(radius,2);
         if (det>0)
         {
            double ans1=-(dir.dot(p+c))+sqrt(det);
            double ans2=-(dir.dot(p+c))-sqrt(det);
            if (ans1<0 && ans2<0) return false;
            else 
            {
               if (ans1<0)    t=ans2;
               else if (ans2<0)    t=ans1;
               else t=ans1<ans2 ? ans1 : ans2;
               return true;
            }
         }
         else if (det==0)
         {
            t=-dir.dot(p+c);
            return t<0;
         }
         else return 0;
      }
      myVector getCenter() {return center;}
      double getRadius() {return radius;}
      void setCenter(myVector c) {center=c;}
      void setRadius(double r) {radius=r;}
};
#endif
