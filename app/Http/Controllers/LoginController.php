<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('backend.welLog');

    }

    public function wel(){
        return view('backend.welLog');

    }

    public function signup(){

        return view('backend.signup');
    }

    public function regestration(Request $request){
        //validation

        // dd($request->all());

        User::create([

            'name'=>$request->user_name,
            'roll'=>$request->user_roll,
            'email'=>$request->user_email,
            'password'=>bcrypt($request->password)
        ]); 


        notify()->success('Regestration Done');

        return redirect()->back();
    }


    
    public function doLogin(Request $request){


        // dd($request->all());

        $crediential = $request->except('_token');
        $check = Auth::attempt($crediential);
        if($check){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back();
        }
        
    }



public function logout()
{
    Auth::logout();

    return redirect()->route('login');
    
}

    
}
