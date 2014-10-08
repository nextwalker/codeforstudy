#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/select.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <errno.h>
int time_out(int sockfd)
{
    fd_set sock_list;
    FD_ZERO(&sock_list);
    FD_SET(sockfd, &sock_list);
    struct timeval time_val;
    time_val.tv_sec = 5;
    time_val.tv_usec = 0;
    return select(sockfd+1,&sock_list, NULL, NULL, &time_val);
}

int main(int argc, char *argv[])
{
    int i;
    int server_socket;
    int select_return=0;
    int client_socket;
    char buffer[512];
    pid_t child_id;
    int read_count;
    fd_set array_set;
    int time_out_return;
    int addr_len = sizeof(struct sockaddr_in);
    struct sockaddr_in ser_addr, client_addr;
    memset(buffer, 0, 512);
    server_socket = socket(AF_INET, SOCK_STREAM, 0);
    if (server_socket < 0) 
    {
        perror("server_socket");
    }
    ser_addr.sin_family = AF_INET;
    ser_addr.sin_port   = htons(6666);
    ser_addr.sin_addr.s_addr   = inet_addr("127.0.0.1");
    if (bind(server_socket, (struct sockaddr *)&ser_addr, addr_len) < 0) 
    {
        perror("bind");
    }
    listen(server_socket, 10);
    while (1)
    {
        FD_ZERO(&array_set);
        FD_SET(server_socket, &array_set);
        select_return = select(server_socket+1, &array_set, NULL, NULL, NULL);
        for (i = 0; i < select_return; i++)
        {
            client_socket=accept(server_socket, (struct sockaddr *)&client_addr, (socklen_t *)&addr_len);
            child_id = fork();
            if (child_id == 0)
            {
                while(1)
                {
                    time_out_return = time_out(client_socket);
                    if(time_out_return == 0)
                    {
                        printf("client time out");
                        close(client_socket);
                        break;        
                    }
                    else if (time_out_return > 0)
                    {
                        if((read_count=read(client_socket, buffer, 512))>0)
                        {
                            //fork 创建多进程
                            close(server_socket);
                            write(client_socket, buffer, read_count);
                            memset(buffer, 0, 512);
                        }
                    }
                }
                exit(2);

            }
            else if (child_id > 0)
            {
                //wait();
                close(client_socket);
            }
        }
    }
    return 0;
}
