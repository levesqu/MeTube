#include "myVector.h"
#include <iostream>
using namespace std;

int main()
{
   myVector p(-.568,3.5,100.4);
   myVector n(.01,-.3,.953887);
   myVector ans=p+((n*(p.dot(n)))*-1);
   cout << ans.getX() << "," << ans.getY() << "," << ans.getZ() << endl;
}
