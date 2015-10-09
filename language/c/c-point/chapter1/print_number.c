#include <stdio.h>

int main() {
    
    int i = 0;
    char input[1024];

    while (gets(input) != NULL) {
        printf("%d, %s\n", ++i, input);
    }

    return 0;
}
