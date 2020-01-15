#include<stdio.h>
#include<stdlib.h>

int minDeletionSize(char** A, int ASize)
{
    int j = 0;
    int sum = 0;
    int i;
    while (*(*(A) + j) != 0) {
        for (i = 1; i < ASize; i++) {
            if (*(*(A + i) + j) < *(*(A + i - 1) + j)) {
                sum++;
                break;
            }
        }
        j++;
    }

    return sum;
}

int main()
{
    char *c [] = {"cba", "daf", "ghi"};
    char **p = NULL;
    p = (char **)malloc(sizeof(char *) * 3);
    int i;
    for (i = 0; i < 3; i++) {
        p[i] = c[i];
    }

    printf("%d\n", minDeletionSize(p, 3));
    free(p);
}
