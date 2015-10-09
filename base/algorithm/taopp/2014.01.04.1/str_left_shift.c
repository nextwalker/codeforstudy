#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void reverse(char *s, int b, int e) 
{
    int c;
    for(; b < e; b++, e--) {
        c = *(s+e);
        //printf("%c\n", c);
        *(s+e) = *(s+b);
        *(s+b) = c;
    }
    //printf("%s\n", s);
}

void left_shift(char *s, int k)
{
    int n;
    n = strlen(s);
    k %= n;
    reverse(s, 0, k-1);
    reverse(s, k , n-1);
    reverse(s, 0, n-1);
} 

int  main(int argc,   char *argv[]) {
    char *s;
    int n;
    int k;
    int i;

    //for (i = 0; i < argc; i++) {
    //    printf("argv%d->%s\n", i, argv[i]);
    //}
    //
    //
    if (argc < 3) { 
        printf("at least need 2 parameters:\n");
        return 0;
    } 

    // 0 程序名
    s = argv[1];
    k = atoi(argv[2]);
    printf("%s\n", s);
    left_shift(s, k);
    printf("%s\n", s);
    return 0;
}
