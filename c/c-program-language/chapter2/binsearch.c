#include <stdio.h>

int binsearch(int x, int v[], int n)
{
    int low, high, mid;

    low = 0;
    high = n - 1;
    while (low <= high) {
        mid = (low + high) / 2;
        if (x < v[mid]) {
            high = mid - 1;
        }else if (x > v[mid]) {
            low = mid + 1;
        }else{
            return mid;
        }
    }
    return -1;
}

int main()
{
    int a[] = {0, 1, 5, 7, 9, 11, 13, 50};
    int num;

    num = binsearch(11, a, 8);
    printf("index of 11 is %d", num);
    printf("-> %d\n", a[num]);
    num = binsearch(0, a, 8);
    printf("index of 0 is %d", num);
    printf("-> %d\n", a[num]);
    num = binsearch(15, a, 8);
    printf("index of 13 is %d", num);
    printf("-> \n");
    
    return 0;
}
