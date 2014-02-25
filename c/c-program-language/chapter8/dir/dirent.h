#define NAME_MAX 14

typedef struct {
    long ino;
    char name[NAME_MAX+1];
} Dirent;

typedef struct {
    int fd;
    Dirent d;
} DIR;

DIR *opendir(char *dirname);
Dirent *readdir(DIR *dfd);
void closedir(DIR *dfd);

// struct stat
// {
//     dev_t st_dev;
//     ino_t st_ino;
//     short st_mode;
//     short st_nlink;
//     short st_uid;
//     short st_gid;
//     dev_t st_rdev;
//     off_t st_size;
//     time_t st_atime;
//     time_t st_mtime;
//     time_t st_ctime;
// }

