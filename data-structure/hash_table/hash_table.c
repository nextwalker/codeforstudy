#include <stdio.h>
#include <stdlib.h>

#define uint8_t unsigned char
#define uint16_t unsigned short
#define uint32_t unsigned long

#define HASH_TABLE_LEN	100

typedef struct _Link_Node  
{  
    uint16_t id;
	uint16_t data;
    struct _Link_Node *next;  
}Link_Node,*Link_Node_Ptr; 

typedef struct _Hash_Header  
{  
    struct _Link_Node *next;  
}Hash_Header,*Hash_Header_Ptr;

Hash_Header_Ptr Hash_Table[HASH_TABLE_LEN];

uint8_t hash_func(uint16_t id)
{
	uint8_t pos = 0;
	
	pos = id % HASH_TABLE_LEN;

	return pos;
}

Link_Node_Ptr init_link_node(void)
{
	Link_Node_Ptr node;
	
	node = (Link_Node_Ptr) malloc(sizeof(Link_Node));
	node->next = NULL;
	
	return node;
}

Hash_Header_Ptr init_hash_header_node(void)
{
	Hash_Header_Ptr node;
	
	node = (Hash_Header_Ptr) malloc(sizeof(Hash_Header));
	node->next = NULL;
	
	return node;
}

void init_hash_table(void)
{
	uint8_t i = 0;
	
	for (i = 0;i < HASH_TABLE_LEN;i++)
	{
		Hash_Table[i] = init_hash_header_node();
		Hash_Table[i]->next = NULL;
	}
}

void append_link_node(Link_Node_Ptr new_node)
{
	Link_Node_Ptr node;
	uint8_t pos = 0;
	
	new_node->next = NULL;
	
	pos = hash_func(new_node->id);
	
	if (Hash_Table[pos]->next == NULL)
	{
		Hash_Table[pos]->next = new_node;
	}
	else
	{
		node = Hash_Table[pos]->next;
		while (node->next != NULL)
		{
			node = node->next;
		}
		
		node->next = new_node;
	}
}

Link_Node_Ptr search_link_node(uint16_t id,uint8_t *root)
{
	Link_Node_Ptr node;
	uint8_t pos = 0;
	
	pos = hash_func(id);
	
	node = Hash_Table[pos]->next;
	
	if (node == NULL)
	{
		return 0;
	}
	
	if (node->id == id)
	{
		*root = 1;
		return node;
	}
	else
	{
		*root = 0;
		while (node->next != NULL)
		{
			if (node->next->id == id)
			{
				return node;
			}
			else
			{
				node = node->next;
			}
		}
		
		return 0;
	}
}

void delete_link_node(Link_Node_Ptr node)
{
	Link_Node_Ptr delete_node;
	
	delete_node = node->next;
	node->next = delete_node->next;
	
	free(delete_node);
	delete_node = NULL;
}

void delete_link_root_node(Link_Node_Ptr node)
{
	uint8_t pos = 0;
	
	pos = hash_func(node->id);
	
	if (node != NULL)
	{
		Hash_Table[pos]->next = node->next;
		free(node);
		node = NULL;
	}
}

uint16_t get_node_num(void)
{
	Link_Node_Ptr node;
	uint16_t i = 0;
	uint16_t num = 0;
	
	for (i = 0;i < HASH_TABLE_LEN;i++)
	{
		node = Hash_Table[i]->next;
		while (node != NULL)
		{
			num++;
			node = node->next;
		}
	}
	
	return num;
}

Link_Node_Ptr get_node_from_index(uint16_t index,uint8_t *root)
{   
    Link_Node_Ptr node;
	uint16_t i = 0;
	uint16_t num = 0;
	
	for (i = 0;i < HASH_TABLE_LEN;i++)
	{
		node = Hash_Table[i]->next;
		if (node == NULL)
		{
			continue;
		}
		
		num++;
        if (num == index)
        {
            *root = 1;
            return node; 
        }
        
		while (node->next != NULL)
		{
			num++;
            if (num == index)
            {
                *root = 0;
                return node; 
            }
			node = node->next;
		}
	}
    
    return 0;
}

void drop_hash()
{
	Link_Node_Ptr node;
	uint16_t i = 0;
	Link_Node_Ptr node_next;
	
	for (i = 0;i < HASH_TABLE_LEN;i++)
	{
		node = Hash_Table[i]->next;
		
		while (1)
		{
			if (node == NULL)
			{
				Hash_Table[i]->next = NULL;
				break;
			}
			
			node_next = node->next;
			free(node);
			node = node_next;
		}
	}
}

void printf_hash()
{
	Link_Node_Ptr node;
	uint8_t root = 0;
	uint8_t i = 0;
	uint8_t num = 0;
	
	printf("-------------打印hash表-------------\n");
	
	num = get_node_num();
	for (i = 1;i <= num;i++)
	{
		node = get_node_from_index(i,&root);
		if (node != 0)
		{
			if (root)
			{
				printf("根节点:节点号%d,id为%d\n",i,node->id);
			}
			else
			{
				printf("普通节点:节点号%d,id为%d\n",i,node->next->id);
			}
		}
	}
}

int main()
{
	Link_Node_Ptr node;
	uint8_t temp = 0;
	uint8_t root = 0;
	uint8_t i = 0;
	
	init_hash_table();
	
	node = init_link_node();
	node->id = 1;
	node->data = 2;
	append_link_node(node);
	
	printf("1节点数为%d\n",get_node_num());
	
	node = init_link_node();
	node->id = 100;
	node->data = 101;
	append_link_node(node);
	
	node = init_link_node();
	node->id = 1002;
	node->data = 1001;
	append_link_node(node);
	
	node = init_link_node();
	node->id = 10000;
	node->data = 10001;
	append_link_node(node);
	
	node = init_link_node();
	node->id = 1000;
	node->data = 10001;
	append_link_node(node);
	
	node = init_link_node();
	node->id = 2;
	node->data = 10001;
	append_link_node(node);
	
	printf("2节点数为%d\n",get_node_num());
	
	node = search_link_node(100,&temp);
	if (node != 0)
	{
		if (temp == 0)
		{
			printf("删除普通节点:所需查询id的值为%d,数据为%d\n",node->next->id,node->next->data);
			
			delete_link_node(node);
		}
		else
		{
			printf("删除根节点所需查询id的值为%d,数据为%d\n",node->id,node->data);
			
			delete_link_root_node(node);
		}
	}
	else
	{
		printf("查询失败\n");
	}
	
	node = search_link_node(1001,&temp);
	if (node != 0)
	{
		if (temp == 0)
		{
			printf("所需查询id的值为%d\n",node->next->data);
		}
		else
		{
			printf("所需查询id的值为%d\n",node->data);
		}
	}
	else
	{
		printf("查询失败\n");
	}
	
	printf("节点数为%d\n",get_node_num());
	printf_hash();
	
	
	getchar();
	return 0;
}

