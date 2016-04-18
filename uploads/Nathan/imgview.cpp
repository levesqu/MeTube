/*
Nathan Jones
1/20/16
This program will do the following:
1) read an image into a pixmap
2) display a pixmap onto the screen
3) write a file from the displayed image

Usage:
"./imgview" will open up an empty window ready for commands
"./imgview [fileName] will open up a window containing the given
file and be ready for commands
Commands:
r/R: read the file and display
w/W: write the image to a file
q/Q/Esc: quit the program

This will only work with 4 channel images at the moment
The display will flip after a write, though neither image is flipped
*/
#include <iostream>
#include <OpenImageIO/imageio.h>
#include <GL/gl.h>
#include <GL/glu.h>
#include <GL/glut.h>
#include <omp.h>
using namespace std;
OIIO_NAMESPACE_USING

string fname;
float *img;
int width, height, channels;

void writeImage(const char*, float *);
void readOIIOImage(const char*, float*);

void display()
{
   glClear(GL_COLOR_BUFFER_BIT);
   glDrawPixels(width, height, GL_RGBA, GL_FLOAT, img);
   glutSwapBuffers();
   glutReshapeWindow(width,height);
}

void Initialize(float *data, long size, float value)
{
#pragma omp parallel for
   for (long i=0;i<size;i++)
      data[i]=value;
}

void cbOnKeyboard( unsigned char key, int x, int y )
{
   switch (key) 
   {
      case 'r': case 'R':
      cout << "Please enter an image name to read: ";
      cin >> fname;
      readOIIOImage(fname.c_str(), img);
      break;
      
      case 'w': case 'W':
      cout << "Please enter an image name to write to: ";
      cin >> fname;
      writeImage(fname.c_str(), img);
      break;
      
      case 'q': case 'Q': case 27:
      cout << "Have a nice day!\n";
      exit(0);
      break;
      
      default:
      break;
   }
}

void writeImage(const char* fname, float* i)
{
      float *pixels = new float[width*height*channels];
      glReadPixels(0,0,width,height,GL_RGBA,GL_FLOAT,pixels);
long index=0;
   for (int j=0;j<height;j++)
   {
      for (int i=0;i<width;i++)
      {
         for (int c=0;c<channels;c++)
         {
         img[(i+width*(height-j-1))*channels+c]=pixels[index++];/*
            if (channels==3 && c==3)
               img[(i+width*(height-j-1))*4+c+1]=1.0;
            else if (channels==3)
               img[(i+width*(height-j-1))*4+c]=pixels[index++];
            else if (c<4)
               img[(i+width*(height-j-1))*channels+c]=pixels[index++];
         */}
      }
   }
      ImageOutput *out=ImageOutput::create(fname);
      if (!out)
         return;
      ImageSpec spec (width, height, channels, TypeDesc::FLOAT);
      out->open (fname, spec);
      out->write_image (TypeDesc::FLOAT, img);
      out->close();
      delete out;
}

void Idle()
{
   glutPostRedisplay();
}

void readOIIOImage( const char* fname, float* i  )
{
   delete img;
   ImageInput *in = ImageInput::open(fname);
   if (!in) return;
   const ImageSpec &spec = in->spec();
   width=spec.width;
   height=spec.height;
   channels=spec.nchannels;
   img = new float[width*height*channels];
   float *pixels = new float[width*height*channels];
   in->read_image(TypeDesc::FLOAT, pixels);
   long index=0;
   for (int j=0;j<height;j++)
   {
      for (int i=0;i<width;i++)
      {
         for (int c=0;c<channels;c++)
         {
         img[(i+width*(height-j-1))*channels+c]=pixels[index++];/*
            if (channels==3 && c==3)
               img[(i+width*(height-j-1))*4+c+1]=1.0;
            else if (channels==3)
               img[(i+width*(height-j-1))*4+c]=pixels[index++];
            else if (c<4)
               img[(i+width*(height-j-1))*channels+c]=pixels[index++];
         */}
      }
   }
   in->close();
   delete in;
}

int main(int argc, char **argv)
{
   width=640;
   height=480;
   channels=4;
   img=new float[width*height*channels];
   glutInit(&argc, argv);
   glutInitDisplayMode(GLUT_RGBA | GL_FLOAT);
   if (argv[1])
      readOIIOImage(argv[1],img);
   else
      memset(img,0.0,width*height*channels*sizeof(float));
   glutInitWindowSize(width, height);
   const char *title = "TESTING";
   glutCreateWindow(title);
   glutDisplayFunc(&display);
   glutIdleFunc(&Idle);
   glutKeyboardFunc(&cbOnKeyboard);
   glutMainLoop();
}
