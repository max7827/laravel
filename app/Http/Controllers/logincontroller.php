<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Upload;

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

    public function dashboard(){
     
        $res=Upload::orderBy('image_name','asc')->get();
        return view('dashboard',['data'=>$res ]);
       
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
      // print_r($res);
       if($res->email== $req->email){
        Session::flash('err','email already existss');
        return redirect()->back()->withInput();

       }
       $user= new User();
       $user->name=$req->name;
       $user->email=$req->email;
       $user->password=$req->password;
       $user->save();
       Session::flash('msg','user registered');
       return redirect()->back();
       

    }

       public function uploadImage(Request $req)
       {




        if ($req->hasFile('files') == false) {
            return redirect()->back()->with(Session::flash('err', 'choosefile'));
        }
        $filename = $req->file('files')->getClientOriginalName();
        $up=new Upload();
        $up->image_name=$filename;
        $up->save();
        
        //$path = $req->file('files')->storeAs($filename, 'public');
        $path = $req->file('files')->move('images',$filename);
        
        if ($path) {
            return redirect()->back()->with(Session::flash('msg', 'file uploaded'));
                                     
            
        } else {
            return redirect()->back()->with(Session::flash('err', 'file not uploaded'));
        }

            
       } 
}
