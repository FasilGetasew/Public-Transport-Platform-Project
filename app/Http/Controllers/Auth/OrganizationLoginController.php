<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Contracts;

class OrganizationLoginController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest:organization',['except' => ['logout']]);
    }

    public function showLoginform(){
        return view('auth.organization-login');
    }



    public function login(Request $request){

        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('organization')->attempt(['email' => $request->email,'password' => $request->password], $request->remember)){

            return redirect()->intended(route('organization.dashboard'));
        }
        $errors = new MessageBag(['email'=>['Invalid Username or Password']]);

        return redirect()->back()->withInput($request->only('email','remember'))->withErrors($errors);


    }
    public function logout(){
        Auth::guard('organization')->logout();
        return redirect('/organization/login');

    }

}
