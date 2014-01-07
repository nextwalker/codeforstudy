#include <stdio.h>
#include <unistd.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <pthread.h>
#include <dirent.h>
#include <fcntl.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <sys/time.h>

#define BUFFER 512

struct copy_file {
    int infile;
    int outfile;
}

void *copy(void *arg)
{
    int infile, outfile;
    int bytes_read, bytes_write, *bytes_copy_p;
    char buffer[BUFFER], *buffer_p;
    struct copy_file *file = (struct copy_file *)arg;
    infile = file.infile;
    outfile = file.outfile;

}
