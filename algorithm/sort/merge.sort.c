#include <stdio.h>
void print_arr(int arr[], int n);
void merge_sort(int arr[], int n);

void merge_sort(int arr[], int n)
{ 
    if (n = 1) {
        return;
    }
    int mid;


}

void print_arr(int arr[], int n) 
{ 
    int i;

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
