#include <stdio.h>
int strlen2(const char s[]) 
{
    int i;

    while (s[i] != '\0') {
        ++i;
    }
    return i;
}

int main()
{
    char *s;

    s = "1234567";
    printf("strlen of %s is %d \n", s, strlen2(s));
    s = "abcd";
    printf("strlen of %s is %d \n", s, strlen2(s));
    return 0;
}
