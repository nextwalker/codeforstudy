#include <stdio.h>

void squeeze(char s[], int c) 
{
    int i, j;
    for (i = j = 0; s[i] != '\0'; i++) {
       if (s[i] != c) {
           s[j++] = s[i];
       }
    }
    s[j] = '\0';
}

int main()
{ 
    char s[] =  "abcdfetcsd";
    printf("%s -> ", s);
    squeeze(s, 'c');
    printf("%s\n", s);
    return 0;
} 


