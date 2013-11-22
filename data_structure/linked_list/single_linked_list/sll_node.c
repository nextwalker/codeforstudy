#include <stdio.h>
#include <stdlib.h>
#include "sll_node.h"

#define	FALSE	0
#define	TRUE	1

int sll_insert(Node **rootp, int new_value) {
	Node *current;
	Node *previous;
	Node *new;

	current = *rootp;
	previous = NULL;
	
	while (current != NULL && current->value < new_value) {
		previous = current;
		current = current->link;
	}
	
	new = (Node *)malloc( sizeof(Node) );
	if (new == NULL) {
		return FALSE;
	}
	new->value = new_value;

	new->link = current;
	if (previous == NULL) {
		*rootp = new;
	} else {
		previous->link = new;
	}
	return TRUE;
}

int sll_insert_new(register Node **linkp, int new_value) {
	register Node *current;
	register Node *new;
	
	while ( (current = *linkp) != NULL &&
		current->value < new_value ) {
		linkp = &current->link;
	}

	new = (Node *)malloc(sizeof(Node));
	if (new == NULL) {
		return FALSE;
	}
	new->value = new_value;

	new->link = current;
	*linkp = new;
	return TRUE;
}

void sll_print(Node *root) {
	Node *current;
	current = root;
	while(current != NULL) {
		printf("%d,", current->value);
		current = current->link;
	}
	printf("\n");
}

int main() {
	Node *root;
	int i;
	int arr[] = {19, 3, 10, 9, 15, 12, 6, 33};
	root = NULL;

	for (i = 0; i < 8; i++) {
		sll_insert_new(&root, arr[i]);
		sll_print(root);
	}
	return TRUE;
}
