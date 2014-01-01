#include <stdio.h>

int atoi2(char s[])
{
    int i, n;

    n = 0;
    for (i = 0; s[i] >= '0' && s[i] <= '9'; ++i) {
        n = 10 * n + (s[i] - '0');
    }

    return n;
}

int main()
{
    char *s;

    s = "1234";
    printf("%s \t -> %6d\n", s, atoi2(s));
    s = "01894";
    printf("%s \t -> %6d\n", s, atoi2(s));
    s = "1a2b3";
    printf("%s \t -> %6d\n", s, atoi2(s));
    return 0;
}
