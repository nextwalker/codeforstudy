#include <stdio.h>
#include <math.h>
#include <sys/time.h>

//int gettimeofday(struct timeval *tv, struct timezone *tz);
//struct timeval {
//    long tv_sec;
//    long tc_usec;
//};

void function() 
{
    unsigned int i, j;
    double y;
    for( i = 0; i < 1000; i++) {
        for (j = 0; j < 10000; j++) {
            y = sin((double)i*j);
        }
    }
}

int main() 
{
    struct timeval tpstart, tpend;
    float timeuse;

    gettimeofday(&tpstart, NULL);
    function();
    gettimeofday(&tpend, NULL);
    timeuse = (tpend.tv_sec - tpstart.tv_sec) + 
         (tpend.tv_usec - tpstart.tv_usec) / 1000000.0;
    printf("Used Time: %f\n", timeuse);
    return 0;
}

