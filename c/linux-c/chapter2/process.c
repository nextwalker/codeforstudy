#include <unistd.h>
#include <sys/types.h>
#include <sys/wait.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <math.h>

pid_t wait(int *stat_loc);
pid_t waitpid(pid_t pid, int *stat_loc, int options);

int main(void)
{

    pid_t child;
    int status;
    printf("This will demostrate how to get child status\n");
    if ((child=fork()) == -1) {
        printf("Fork Error: %s\n", strerror(errno));
        exit(1);
    } else if (child == 0) {
        int i;
        printf("I am the child: %ld\n", getpid());
        for (i = 0; i < 1000000; i++) {
            sin(i);
        }
        i = 5;
        printf("I exit with %d\n", i);
        exit(i);
    }
    while (((child=wait(&status)) == -1)&(errno == EINTR)) {
        ;
    }
    if (child == -1) {
        printf("Wait Error: %s\n", strerror(errno));
    } else if (!status) {
        printf("Child %ld terminated normally return status is zero\n", child);
    } else if (WIFEXITED(status)) {
        printf("Child %ld terminated normally return status is %d\n", child, WIFEXITED(status));
    } else if (WIFSIGNALED(status)) {
        printf("Child %ld terminated due to signal %d znot caugth\n", child, WTERMSIG(status));    
    }
    return 0;
}
