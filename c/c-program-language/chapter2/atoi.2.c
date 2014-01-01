#include <stdio.h>
#include <ctype.h>

int atoi( char s[])
{
    int i, n, sign;

    for (i = 0; isspace(s[i]); i++) {
        ;
    }
    sign = (s[i] == '-') ? -1 : 1;
    if (s[i] == '+' || s[i] == '-') {
        i++;
    }
    for (n = 0; isdigit(s[i]); i++) {
        n = 10 * n + s[i] - '0';
    }
    return sign * n;
}

int main()
{
    char *s;
    s = " -123bdg3";
    printf("%s->%d\n", s, atoi(s));
    s = "+df123";
    printf("%s->%d\n", s, atoi(s));
    s = "89x07";
    printf("%s->%d\n", s, atoi(s));
    return 0;
}
