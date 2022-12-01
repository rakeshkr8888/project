#include <iostream>
#include <ctime>
#include<iomanip>
using namespace std;

int main()
{
    srand(time(0));
    int run=0,out=0;
    int over,ball=6, countOver=0, countBall=0;
    printf("enter number of overs : ");
    scanf("%d",&over);
    int a=-3,b=6;
    const char* player[11]={"Shikhar Dhawan","Jasprit Bumrah","Yuzvendra Chahal","Rishabh Pant","Rohit Sharma","Axar Patel","Suryakumar Yadav","Hardik Pandya","Lokesh Rahul","Virat Kohli","Harshal Patel"};
    int Tplayer=sizeof(player)/sizeof(char*);
    // cout<<"Tplayer"<<Tplayer<<endl;
    // for(int i=0;i<11;i++) cout<<player[i]<<" ";
    while(out<Tplayer && over>countOver){
        int flag=0;
        int current_p_sc=0;
        int current_p_ball=0;
        // cout<<"(1)   Total run: "<<run<<"   over: "<<countOver<<"."<<countBall<<endl;
        while(countOver<over){
            cout<<"*********** "<<"Current score:-    Total run: "<<run<<"   "<<"over: "<<countOver<<"."<<countBall<<" **********"<<endl;
            cout<<endl;
            while(countBall<ball){

                // cout << (float) rand()/RAND_MAX << endl;
                // int rndm=(((float) rand()/RAND_MAX)*b)+a;
                
                int num;
                cout<<"    enter any value from 1 to 20 included : ";
                cin>>num;
                while(num<1 || num>20){
                    cout<<"you have entered wrong number try to enter number between range 1 to 20 included : ";
                    cin>>num;
                }
                int a=rand();
                // cout<<"a is "<<a<<endl;
                int rndm=a/num;
                int tmp=rndm;
                int size=0;
                while(tmp>9){
                    tmp=tmp/10;
                    // size++;
                }
                rndm=tmp;

                if(rndm==5){
                    cout<<"score : "<<rndm+2<<endl;
                }
                else{
                    cout<<"score : "<<rndm<<"  ";
                }
                if(rndm>6 || rndm==5){
                    cout<<"---------- "<<"Out! "<<player[out]<<" ----------";
                    countBall++;
                    current_p_ball++;
                    // cout<<"Total run: "<<run<<"   over: "<<countOver<<"."<<countBall<<endl;
                    out++;
                    flag=1;
                    break;
                }
                else if(rndm<=6){
                    run=run+rndm;
                    current_p_sc=current_p_sc+rndm;
                    countBall++;
                    current_p_ball++;
                    // cout<<"Total run: "<<run<<"   over: "<<countOver<<"-"<<countBall<<endl;
                }
            }
            cout<<endl;
            if(flag==1 && countBall<6){
                // cout<<"flaf==1 (1) Total run: "<<run<<"   over: "<<countOver<<"-"<<countBall<<endl;
                cout<<"------- "<<player[out-1]<<": "<<"score:- "<<current_p_sc<<"   "<<"In "<<(current_p_ball/6)<<"."<<current_p_ball%6<<" ----------"<<endl;
                cout<<"----------- "<<"Next player "<<player[out]<<" ------------"<<endl;
                break;
            }
            else if(flag==1 && countBall>5){
                cout<<"----------- "<<player[out-1]<<": "<<"score:- "<<current_p_sc<<"   "<<"In "<<(current_p_ball/6)<<"."<<current_p_ball%6<<" ---------"<<endl;
                countBall=0;
                countOver++;
                cout<<"----------- "<<"Next player "<<player[out]<<" ----------"<<endl;
                cout<<"******* Over end **********"<<endl;
                // cout<<"flag==1 (2) Total run: "<<run<<"   over: "<<countOver<<"-"<<countBall<<endl;
                break;
            }
            else if(flag==0){
                countOver++;
                countBall=0;
                if(over==countOver){
                cout<<"----------- "<<player[out-1]<<": "<<"score:- "<<current_p_sc<<"   "<<"In "<<(current_p_ball/6)<<"."<<current_p_ball%6<<" ---------"<<endl;
                }
                cout<<"******* Over end **********"<<endl;
                // cout<<"flag==0 (3) Total run: "<<run<<"   over: "<<countOver<<"-"<<countBall<<endl;
            }
        }
    }
    printf("Match End Total run: %d   over: %d-%d   out: %d \n",run,countOver,countBall,out);






//    int a=-3,b=9;
//     // for(int i=0;i<10;i++){
//     //     cout << (float) rand()/RAND_MAX <<"   ";
//     //     // int rndm=(((float) rand()/RAND_MAX)*b)+a;
//     //     // cout<<rndm<<"  ";
//     // }
//     srand(time(0));
//     cout<<endl;
    
//     for(int i=0;i<10;i++){
//         // string rndm=to_string(rand());
//         // int size=rndm.size();
//         // rndm=stoi(rndm);

//         int rndm=rand();
//         cout<<"rndm : "<<rndm<<" ";
//         int tmp=rndm;
//         int size=0;
//         while(tmp>9){
//             tmp=tmp/10;
//             size++;
//         }
//         if(tmp<=6){
//             rndm=tmp;
//             cout<<"(1) "<<rndm<<" ";
//         }
//         else{
//             cout<<"out!"<<endl;
//         }
//     //     int a=-1,b=7;
//     //     cout<<size<<" ";
//     //     float num=rndm/pow(10,size);
//     //     cout<<num<<" ";
//     //     int ans=(num*b)+a;
//     //     cout<<a<<"   ";
//     //     // cout<<pow(i,i)<<"  ";

//     //     // cout<<rndm<<" "<<rndm.size()<<"    ";
//     }
        
//      cout<<endl;

        // float f=3.232;
        // cout<<fixed;
        // cout<<setprecision(2) <<f<<endl;
    return 0;
}