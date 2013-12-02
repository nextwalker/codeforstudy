#include <stdio.h>
void print_arr(int arr[], int n);
void bubble_sort(int arr[], int n);

void bubble_sort(int arr[], int n)
{
    int i, j;

    for (i = 0; i < n - 1; i++) {
        for (j = 0; j < n - i - 1; j++) {
            if (arr[j] > arr[j+1]) {
                arr[j] = arr[j] + arr[j+1];
                arr[j+1] = arr[j] - 2 * arr[j+1];
                arr[j+1] = (arr[j] + arr[j+1]) / 2;
                arr[j] = arr[j] - arr[j+1];
            }
            // printf("i:%d j:%d ", i, j);
            // print_arr(arr, n);
        }
    }
}

void print_arr(int arr[], int n) 
{
    int i;

    //n = sizeof(*arr)/sizeof(int);
    //printf("length:%d\n", n);
    for (i = 0; i < n; i++) {
        printf("%d -> ", arr[i]);
    }
    printf("\n");
}

int main()
{
    int numbers[] = {42, 41, 35, 27, 23, 21, 19, 15, 13};
    printf("raw is:   ");
    print_arr(numbers, 9);
    bubble_sort(numbers, 9);
    printf("sorted is:");
    print_arr(numbers, 9);
    return 0;
}
