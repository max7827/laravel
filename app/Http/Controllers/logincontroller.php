<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
class logincontroller extends Controller
{
    public function login(){
        return view('login');
    }

    public function userlist(){
        return view('userlist');
    }
    public function register(){
        return view('register');
    }

    public function loginsubmit(Request $req){
        
       $res = User::where('email',$req->email)->first();
       //$res2 = User::where('password',$req->password)->get();
       if(!isset($res) || $res == null)
       {   
           Session::flash('msg','No User Found with this email');
           return redirect()->back()->withInput();
       }
          // dd($res);
      if($req->password==$res['password'] ) {
         
        return redirect('dashboard');


       }
      
      //    if()

    //    {
    //        dd('dw');
    //    }
    
        
    }

    public function registersubmit(Request $req){
       $User= new User();
       $User->name=$req->name;
       $User->email=$req->email;
       $User->password=$req->password;
       $User->save();

    }

    // public function home(){
    //     return view('home');
    //  }
}
