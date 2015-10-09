/**
 * hash table的实现
 * */

#include <stdio.h>
#include <stdlib.h>

#define uint8_t unsigned char
#define uint16_t unsigned short
#define uint32_t unsigned long

#define HAST_TABLE_LEN 100

typedef struct _Link_Node {
    uint16_t id;
    uint16_t data;
    struct _Link_Node *next;
}Link_Node, *Link_Node_Ptr;

typedef struct _Hash_Header {
    struct _Link_Node *next;
}Hash_Header, *Hash_Header_Ptr;

Hash_Header_Ptr Hash_Table[HASH_TABLE_LEN];

uint8_t hash_fun(uint16_t id)
{
    uint8_t pos = 0;

    pos = id % HASH_TABLE_LEN;

    return pos;
}

Hash_Header_Ptr  init_hash_header_node(void)
{
    Hash_Header_Ptr  Node;

    node = (Hash_Header_Ptr)malloc(sizeof(Hash_Header));
    node->next = NULL;
    return node;
}

void init_hash_table(void) 
{
    uint8_t i = 0;

    for (i = 0; i < HASH_TABLE_LEN; i++) {
        Hash_Table[i] = init_hash_header_node();
        Hash_Table[i]->next = NULL;
    }
}

void append_link_node(Link_Node_Ptr new_node)
{
    Link_Node_Ptr node;
    uint8_t pos = 0;

    new_node->next = 0;

    pos = hash_func(new_node->id);

    if (Hash_Table[pos]->next == NULL) {
        Hash_Table[pos]->next = new_node;
    } else {
        
    }
}
