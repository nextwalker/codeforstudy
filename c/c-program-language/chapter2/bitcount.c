#include <stdio.h>

int bitcount(unsigned x)
{
    int b;

    for (b = 0; x != 0; x >>= 1) {
        if (x & 01) {
            b++;
        }
    }
    return b;
}

int main()
{
    printf("3 bitcount -> %d\n", bitcount(3));
    printf("7 bitcount -> %d\n", bitcount(7));
    printf("31 bitcount -> %d\n", bitcount(31));
    return 0;
}
