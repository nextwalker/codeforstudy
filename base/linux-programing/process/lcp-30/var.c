#include <stdio.h>
#include <stdlib.h>
//char *getenv(const char *name);
//int setenv(const char *name, const char *value, int rewrite);
//void unsetenv(const char *name);

int main()
{
    extern char **environ;
    int i;

    for (i = 0; environ[i] != NULL; i++) {
        printf("%s\n", environ[i]);
    }
    printf("\n\n");
    printf("PATH is %s\n", getenv("PATH"));
    setenv("PATH", "hello", 1);
    printf("PATH is %s\n", getenv("PATH"));
    return 0;
}
