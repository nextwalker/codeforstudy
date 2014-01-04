#include <stdio.h>
#include <assert.h>
#include "stack.h"

#define STACK_SIZE 100

static STACK_TYPE stack[STACK_SIZE];
static int  top_element = -1;

void push(STACK_TYPE value)
{
    assert( !is_full() );
    top_element += 1;
    stack[top_element] = value;
}

void pop(void)
{
    assert( !is_empty() );
    top_element -= 1;
}

STACK_TYPE top(void)
{
    assert( !is_empty() );
    return stack[top_element];
}

int is_empty(void)
{
    return top_element == -1;
}

int is_full(void)
{
    return top_element == STACK_SIZE - 1;
}

int main()
{
    int a[] = {1,9,6,8,3,2,5,3};
    int i;
    for (i = 0; i < 8; i++) {
        push(a[i]);
    }
    for (i = 0; i < 8; i++) {
        printf("%d ", a[i]);
    }
    printf("\n");
    pop();
    printf("%d\n", top());
    return 0;
}
