#include <iostream>
#define len 10
using namespace std;

class NumberTB  
{  
private:
    int top[len];  
    int bottom[len];
    bool success;
public:
    NumberTB();
    int* getBottom();
    void setNextBottom();
    int getFrequecy(int num);
};

NumberTB::NumberTB()  
{    
    success = false;  
    //format top   
    for(int i=0;i<len;i++)  
    {  
        top[i] = i;          
        //bottom[i] = 0; 
    }          
}

int* NumberTB::getBottom()
{  
    int i = 0;      
    while(!success)  
    {  
        i++;  
        setNextBottom();  
     }          
    return bottom;  
}   

//set next bottom   
void NumberTB::setNextBottom()  
{  
    bool reB = true;  
   
    //for(int i=0;i<len;i++) {
    //  printf("%d->%d ", i, bottom[i]);
    //}
    //printf("\n");
    for(int i=0;i<len;i++)  
    {  
        int frequecy = getFrequecy(i);  
       
        if(bottom[i] != frequecy)  
        {  
            bottom[i] = frequecy;  
            reB = false;  
        }   
    }  
    success = reB;  
}  

//get frequency in bottom   
int NumberTB::getFrequecy(int num)   //此处的num即指上排的数 i
{  
    int count = 0;  
   
    for(int i=0;i<len;i++)  
    {  
        if(bottom[i] == num)  
            count++;  
    }  
    return count;    //cout即对应 frequecy
}

int main()
{   
    NumberTB nTB;
    int* result= nTB.getBottom();  

    for(int i=0;i<len;i++) 
    {  
        cout<<*result++<<endl;  
    }  
    return 0;
}      
