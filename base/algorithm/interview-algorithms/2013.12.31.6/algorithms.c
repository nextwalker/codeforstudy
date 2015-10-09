#include <stdio.h>
#define LEN 10

int count_frequecy(int num, int *numbers, int len) {
    int i;
    int count;

    count = 0;
    for (i = 0; i < len; i++) {
        if (numbers[i] == num) {
            count++;
        }
    }
    return count;
}

void set_bottom(int *top, int *bottom) {
    int success;
    int count;
    int i;
    while (1) {
        success = 1;
        for (i = 0; i < LEN; i++) {
            count = count_frequecy(top[i], bottom, LEN);
            if (bottom[i] != count) {
                bottom[i] = count;
                success = 0;
             }
        }
        if (success) { 
            break;
        }
    }
}

int main() 
{
    int top[LEN];
    int bottom[LEN];
    int i;

    for (i = 0; i < LEN; i++) {
        top[i] = i;
    }
    // bottom 未初始化的问题，没报错

    set_bottom(top, bottom);
    for (i = 0; i < LEN ; i++) {
        printf("%d ", top[i]);
    }
    printf("\n");
    for (i = 0; i < LEN ; i++) {
        printf("%d ", bottom[i]);
    }
    printf("\n");
}
