<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class logincontroller extends Controller
{   
         
    
    public function login(){
        
        Session::forget('title');
        Session::put('title','login');
        return view('login');

    }

    public function userlist(){
        Session::forget('title');
        Session::put('title','userlist');
        $res=User::all();
        return view('userlist',['data'=>$res ]);
       
    }
    public function register(){

        Session::forget('title');
        Session::put('title','Register');

        return view('register');
    }

    public function loginsubmit(Request $req){
        
       $res = User::where('email',$req->email)->first();
     
       //$res2 = User::where('password',$req->password)->get();
       if(!isset($res) || $res == null)
       {   
           Session::flash('msg','No User Found with this email');
           return redirect()->back();
       }
          // dd($res);
      if($req->password==$res['password'] ) {
       // Session::put('title',$title);
      // $title=User::all();
       // return view('dashboard',['title'=>$title]);
        return redirect('dashboard');


       }
      
      //    if()

    //    {
    //        dd('dw');
    //    }
    
        
    }

    public function registersubmit(Request $req){
      
       $res = User::where('email',$req->email)->first();
       print_r($res);
       if($res->email== $req->email){
        session::flash('msg','email already existss');
        return redirect()->back()->withInput();

       }else{
       $user= new User();
       $user->name=$req->name;
       $user->email=$req->email;
       $user->password=$req->password;
       $user->save();
       session::flash('msg','user registered');
       return redirect()->back();
       }

    }

       public function uploadImage(Request $req)
       {   //Storage::putFile(piblic/image,['image',$req->files]);
          $path= $req->file('files')->store('images','public');
           //return dd($req->hasFile('files'));
           dd($path);
            return 'uploaded';
       } 
}
