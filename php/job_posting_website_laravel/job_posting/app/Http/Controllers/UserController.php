<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $formFilled=$request->validate([
            'email'=>['required',"email"],
            'password'=>'required'
        ]);
        if(auth()->attempt($formFilled)){
            $request->session()->regenerate();
            $request->session()->regenerateToken();
            return redirect('/')->with('message','login successfully');
        }
        return back()->withErrors(['email'=>"invalid credentials"])->onlyInput('email');
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request){
        $formFilled=$request->validate([
            'name'=>"required",
            "email"=>['required',"email",Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);

        $formFilled['password']=bcrypt($formFilled['password']);
        $user=User::create($formFilled);
        auth()->login($user);
        return redirect('/')->with('message',"login successfully");
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message',"Logout successfully");
    }
}
