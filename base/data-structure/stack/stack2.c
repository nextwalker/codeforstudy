#include <stdio.h>
#include <stdlib.h>
//#include <malloc.h>
#include <ctype.h>
#include <assert.h>
#include "stack.h"

static STACK_TYPE   *stack;
static size_t       stack_size;
static int          top_element = -1;


void create_stack(size_t size)
{
    assert( stack_size == 0);
    stack_size = size;
    stack = malloc(stack_size * sizeof(STACK_TYPE));
    assert(stack != NULL);
}

void destroy_stack(void)
{
    assert(stack_size > 0);
    stack_size = 0;
    free(stack);
    stack = NULL;
}

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
    return top_element == stack_size - 1;
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
