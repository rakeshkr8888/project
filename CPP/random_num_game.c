<<<<<<< HEAD
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(int argc, char *argv[]) {
  srand((unsigned int) time(NULL));
  printf("%f\n", ((float) rand() / (float)(RAND_MAX)));
  int a=0,b=20;
  int c=(((float) rand() / (float)(RAND_MAX))*b)+a;
//   printf("%d\n",c);

int num;
int count=0;
printf("enter your number\n");
scanf("%d",&num);
count++;
if(num!=c){
    while(num!=c && count<=9){
        printf("enter your number again\n");
        // cin>>num;
        scanf("%d",&num);
        count++;
        if(num==c){
            printf("you win the game in %d chance\n",count);
            break;
        }

        if(count>=5){
            int hint;
            printf("Do you want to use hint1 (odd even) then press 0 and press 1 for hint2 (larger smaller) : ");
            scanf("%d",&hint);
            if(hint==0){
                if(c%2==0){
                    printf("number is even\n");
                }
                else{
                  printf("number is odd\n");
                }
            }
            else if(hint==1){
                if(num>c){
                    printf("try to enter smaller number\n");
                }
                else if(num<c){
                    printf("try to enter larger number\n");
                }
            }
            else{
                printf("you have enter the wrong input\n");
            }
            
            // else{
                // printf("you have lost your hint turn best of luck!\n");
            // }
        }
    }
    if(count>9){
        printf("lose! you have used all your %d turn \n",count);
    }
}
else{
    // cout<<"you win the game in "<<count<<endl;
    printf("you win the game in %d change\n",count);
}
  
    return 0;
}
=======
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

int main(int argc, char *argv[]) {
  srand((unsigned int) time(NULL));
  printf("%f\n", ((float) rand() / (float)(RAND_MAX)));
  int a=0,b=20;
  int c=(((float) rand() / (float)(RAND_MAX))*b)+a;
//   printf("%d\n",c);

int num;
int count=0;
printf("enter your number\n");
scanf("%d",&num);
count++;
if(num!=c){
    while(num!=c && count<=9){
        printf("enter your number again\n");
        // cin>>num;
        scanf("%d",&num);
        count++;
        if(num==c){
            printf("you win the game in %d chance\n",count);
            break;
        }

        if(count>=5){
            int hint;
            printf("Do you want to use hint1 (odd even) then press 0 and press 1 for hint2 (larger smaller) : ");
            scanf("%d",&hint);
            if(hint==0){
                if(c%2==0){
                    printf("number is even\n");
                }
                else{
                  printf("number is odd\n");
                }
            }
            else if(hint==1){
                if(num>c){
                    printf("try to enter smaller number\n");
                }
                else if(num<c){
                    printf("try to enter larger number\n");
                }
            }
            else{
                printf("you have enter the wrong input\n");
            }
            
            // else{
                // printf("you have lost your hint turn best of luck!\n");
            // }
        }
    }
    if(count>9){
        printf("lose! you have used all your %d turn \n",count);
    }
}
else{
    // cout<<"you win the game in "<<count<<endl;
    printf("you win the game in %d change\n",count);
}
  
    return 0;
}
>>>>>>> 4617f614aec901265fcd6a06530b7e4a47071749
