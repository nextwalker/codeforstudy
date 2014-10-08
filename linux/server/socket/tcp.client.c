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
    int client_socket;
    int write_count;
    char send_buffer[512];
    int addr_len = sizeof(struct sockaddr_in);
    struct sockaddr_in ser_addr;
    client_socket = socket(AF_INET, SOCK_STREAM, 0);
    if (client_socket < 0)
    {
        perror("client socket");
    }
    ser_addr.sin_family = AF_INET;
    ser_addr.sin_port   = htons(6666);
    ser_addr.sin_addr.s_addr = inet_addr("127.0.0.1");
    if (connect(client_socket, (struct sockaddr *)&ser_addr, addr_len) < 0) 
    {
        perror("connect");
    }
    while (fgets(send_buffer, 512, stdin) != NULL)
    {
        write_count = write(client_socket, send_buffer, strlen(send_buffer));
        memset(send_buffer, 512, 0);
        read(client_socket, send_buffer, 512);
        printf("%s[%d]\n", send_buffer, write_count);
        memset(send_buffer, 512, 0);
    }
    return 0;
}
