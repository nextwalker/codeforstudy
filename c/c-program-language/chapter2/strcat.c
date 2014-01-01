#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void strcat2(char s[], char t[])
{
    int i, j;

    i = j = 0;
    while (s[i] != '\0') {
        i++;
    }
    while ((s[i++] = t[j++]) != '\0') {
        ;
    }
}

int main()
{
    char s[30];
    char t[] = "abcdefg";
    strcpy (s, "lkjhg");
    strcat2(s, t);
    printf("%s\n", s);
    return 0;
}
