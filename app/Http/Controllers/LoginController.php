<?php

namespace App\Http\Controllers;

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
