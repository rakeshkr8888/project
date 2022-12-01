#include <iostream>
#include<map>
#include<limits.h>
using namespace std;
int main()
{
    int t_team;
    cout << "enter total no of teams" << endl;
    cin >> t_team;
    int t_score[t_team];
    // while (t_team!=1){
    //     for(int i=0;i<t_team;i++){
            if(t==1){
                unordered map<string, int>m;
                // int t_team;
                // cout<<"enter number of teams"<<endl;
                // cin>>t_team;
                // for(int i=0;i<t_team;i++ ){
                    cout<<"enter 1st team name"<<endl;
                    // cin>>t_team;
                    m[t_name]=0;
                }
            }
                int k_team=t_team;
                unordered map<string, int>::iterator it;
                while(k_team!=1){
                    for(it=m.begin();it!=m.end();it++){
                        (*it).second=match();
                        cout<<(*it).first<<" score "<<(*it).second<<endl;
                    }
                    int min=MAX_INT;
                    string t_lose;
                    for(it=m.begin();it!=m.end();it++){
                        if((*it).second<min){
                            min=(*it).second;
                            t_lose=(*it).first;
                        }
                    }
                    m.erase(t_lose);
                    for(it=m.begin();it!=m.end();it++){
                        cout<<(*it).first<<" score "<<(*it).second<<endl;
                    }
                    k_team--;
                }
            // }
        // }
    // }
        return 0;
}