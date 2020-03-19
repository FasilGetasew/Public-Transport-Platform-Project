<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\MessageBag;

class AdminLoginController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest:admin',['except' => ['logout']]);
    }

    public function showLoginform(){
        return view('auth.admin-login');
    }

    public function login(Request $request){

        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password], $request->remember)){

            return redirect()->intended(route('admin.dashboard'));
        }
        $errors = new MessageBag(['email'=>['Invalid Username or Password']]);


        return redirect()->back()->withInput($request->only('email','remember'))->withErrors($errors);


    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');

    }


}
