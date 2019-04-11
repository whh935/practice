#include <stdio.h>

void show(int arr[], int length)
{
    for (int i = 0; i < length; i++) {
        printf("%d ", arr[i]);
    }
    printf("\n");
}

void bubble_sort(int* arr, int length)
{
    for (int i = 0; i < length; i++) {
        for (int j = 0; j < length - i - 1; j++) {
            if (arr[j] > arr[j + 1]) {
                int tmp = arr[j];
                arr[j] = arr[j + 1];
                arr[j +1] = tmp;
            }
        }
    }
}

int main()
{
    int arr[10] = {15,77,23,43,90,87,68,32,11,22};
    show(arr, 10);

    bubble_sort(arr, 10);
    show(arr, 10);

    return 0;
}
