<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

use App\Client;

class AuthController extends Controller
{
    public function getSignup()
    {
        return view('templates.auth.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|unique:clients|email|max:255',
            'password'=>'required|min:6'
        ]);

        Client::create([
            'email'=>$request->input('email'),
            'password'=>password_hash($request->input('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->route('home')->with('info','Ви успішно зареєструвалися');
    }

    public function test()
    {
        return view('test');
    }

    public function getSignin()
    {
        return view('templates.auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|max:255',
            'password'=>'required|min:6'
        ]);

       if(!Auth::attempt($request->only(['email','password'])))
        {
            return redirect()->back()->with('info','Неправильий email або пароль');
        }

        $data = $request->input('email');
        $request->session()->push('name',$data);
       
        return redirect()->route('client')->with('info','Ви успішно авторизувалися');


    }

    public function getSignout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('name');
        return redirect()->route('home');
    }

}
