/*
   Nathan Jones
   2/3/16
   Contains an extremely primitive node class for linked lists
   Contains the code for raycasting (including orthographic
   and perspective calculations), finding the closest hit object
   from the list, drawing that color to the current pixel, and
   outputting the image
*/
#include "ray.h"
#include <tgmath.h>
#include <math.h>
#include <OpenImageIO/imageio.h>
#ifndef CAMERA_H
#define CAMERA_H

const char *oName="ortho.exr";
const char *pName="persp.exr";
const float length=10.0;
const float ratio=9.0/16.0;
const float fov=90.0;
OIIO_NAMESPACE_USING

class node {
   public:
      sphere *s;
      node *next;
      node(sphere *sph, node *n) : s(sph), next(n) {}
};

class camera {
   protected:
      myVector loc, dir;
      node *head;
      int num;
   public:
      camera(node *h, int n) : loc(myVector(0,0,0)), dir(myVector(0,0,1)), head(h), num(n) {}
      camera(myVector l, myVector d, node *h, int n) : loc(l), dir(d), head(h), num(n) {}
      void writeImage(int width, int height, bool isOrtho)
      {
         loc=myVector(0,0,0);
         dir=myVector(0,0,1);
         int size=width*height*3;
         float *image=new float[size];
         for (int i=0;i<size;i+=3)
         {
            if (isOrtho)
            {
               loc.setX(length*(((i%(width*3))/(float)(width*3))-.5));
               loc.setY(length*ratio*(((i/(width*3))/(float)(height))-.5));
               loc.setZ(0);
            }
            else
            {
               float a=fov*(((i%(width*3))/(float)(width*3))-.5);
               dir.setX(sin(a/180*M_PI)/sin((90.0-a)/180*M_PI));
               float b=fov*ratio*(((i/(width*3))/(float)(height))-.5);
               dir.setY(sin(b/180*M_PI)/sin((90.0-b)/180*M_PI));
               dir.setZ(1);
            }
            myVector color;
            double dist, min=-1;
            node *curr=head;
            ray view(loc,dir);
            sphere *close=NULL;
            for (int j=0;j<num;j++)
            {
               if (curr->s->intersection(view, dist))
               {
                  if ((min==-1 && close==NULL) || dist < min)
                  {
                     min=dist;
                     close=curr->s;
                  }
               }
               curr=curr->next;
            }
            if (close!=NULL) {color=close->getColor();}
            else {color.set(0,0,0);}
            image[i]=color.getX();
            image[i+1]=color.getY();
            image[i+2]=color.getZ();
         }
         ImageSpec spec(width,height,3,TypeDesc::FLOAT);
         ImageOutput *out;
         if (isOrtho) 
         {
            out=ImageOutput::create(oName);
            out->open(oName,spec);
         }
         else
         {
            out=ImageOutput::create(pName);
            out->open(pName,spec);
         }
         out->write_image(TypeDesc::FLOAT,image);
         out->close();
         delete out;
      }
};
#endif
