#include <stdio.h>
#include <ctype.h>

int main(int argc, char *argv[]) 
{
    char c;
    while ( (c = *(*argv)++) != '\0') {
        if (c >= 'A' && c <= 'Z') {
            c = tolower(c); 
        } else if (c >= 'a' && c <= 'z'){
            c = toupper(c);
        } else {
            putchar('\\');
        }
        putchar(c);
    }
    printf("\n");

}
