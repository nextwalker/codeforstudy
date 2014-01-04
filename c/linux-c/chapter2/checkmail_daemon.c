#include <unistd.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <fcntl.h>
#include <signal.h>

#define MAIL "/var/spool/mail/root"

#define SLEEP_TIME 10

int main()
{
    pid_t child;
    if ((child=fork()) == -1) {
        printf("Fork Error: %s\n", strerror(errno));
        exit(1);
    } else if (child > 0) {
    // while (1) {;}
        if (kill(getppid(), SIGTERM) == -1)
        {
            printf("Kill Parent Error: %s\n", strerror(errno));
            exit(1);
        }
    } else {
        int mailfd;
        while (1) {
            if ((mailfd = open(MAIL, O_RDONLY)) != -1) {
                fprintf(stderr, "%s", "\007");
                close(mailfd);
            }
            sleep(SLEEP_TIME);
        }
    }
}
