#include <stdio.h>
#include <sys/types.h>
#include <unistd.h>
void main()
{
if (fork() == 0)
printf("Hello from Child!\n");
else
printf("Hello from Parent!\n");
}