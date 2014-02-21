#include <stdio.h>
#include <unistd.h>

int getchar2(void)
{
    char c;
    return (read(0, &c, 1) == 1) ? (unsigned char) c : EOF;
}

int getchar3(void)
{
    static char buf[BUFSIZ];
    static char *bufp = buf;
    static int n = 0;

    if (n == 0) {
        n = read(0, buf, sizeof buf);
        printf("read:%ld get:%d\n", sizeof buf, n);
        bufp = buf;
    }
    return (--n >= 0) ? (unsigned char)*bufp++ : EOF;
}

int main() 
{
    int c;
    
    while ((c = getchar2()) != EOF) {
        printf("from getchar2:%c\n", c);
    }
    
    while ((c = getchar3()) != EOF) {
        printf("from getchar3:%c\n", c);
    }
    return 0;
}
