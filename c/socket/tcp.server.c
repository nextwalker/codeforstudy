#include <stdio.h>
#include <string.h>
#include <sys/socket.h>
#include <unistd.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <errno.h>
int main(int argc, char *argv[])
{
    int server_socket;
    int client_socket;
    char buffer[512];
    pid_t child_id;
    int read_count;
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
        client_socket=accept(server_socket, (struct sockaddr *)&client_addr, (socklen_t *)&addr_len);
        child_id = fork();
        if (child_id == 0)
        {
            while((read_count=read(client_socket, buffer, 512))>0)
            {
                //fork 创建多进程
                close(server_socket);
                write(client_socket, buffer, read_count);
                memset(buffer, 0, 512);
            }
        }
        else if (child_id > 0)
        {
            close(client_socket);
        }
    }
    return 0;
}
