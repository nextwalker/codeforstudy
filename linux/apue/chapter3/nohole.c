#include "apue.h"
#include <fcntl.h>

char buf1[] = "abcdefghij";
char buf2[] = "ABCDEFGHIJ";

int main()
{
    int fd;
    if ((fd = creat("file.nohole", FILE_MODE)) < 0) {
        err_sys("creat error");
    }
    if (write(fd, buf1, 10) != 10) {
        err_sys("buf1 write error");
    }
    /* offset now = 10 */
    while(lseek(fd, 0, SEEK_CUR) < 16384) {
        write(fd, "x", 1);
    }
    /* offset now = 16384 */
    if (write(fd, buf2, 10) != 10) {
        err_sys("buf2 write error");
    }
    /* offset now = 16394 */
    exit(0);
}
