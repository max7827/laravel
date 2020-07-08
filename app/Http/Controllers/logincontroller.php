<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRequest;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use App\User;
use App\Upload;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
     
        $res=Upload::orderBy('file_name','asc')->get();
        return view('dashboard',['data'=>$res ]);
       
    }
    public function register(){

        Session::forget('title');
        Session::put('title','Register');

        return view('register');
    }

    public function loginsubmit1(loginRequest $req){
        dd($req);
    }

    public function loginsubmit(loginRequest $req){
       
        // $req->validate([
        //     'email'=>'required|max:255',
        //     'password'=>'required | min:3'
        // ]);
        //dd($req);
        $res = User::where('email',$req->email)->first();
       //dd($res->isEmpty());
        //dd($res['password']);
     //  dd(User::where('email',$req->email)->pluck('password'));
       //$res2 = User::where('password',$req->password)->get();
       if(!isset($res) || $res == null)
       {  
       
           Session::flash('err','No User Found with this email');
           return redirect()->back();
       }
          
      if($req->password==$res['password'] ) {
       // Session::put('title',$title);
      // $title=User::all();
       // return view('dashboard',['title'=>$title]);
        return redirect('dashboard');


       }else{
        Session::flash('err','password incorrect');
        return redirect()->back();

       }
      
      //    if()

    //    {
    //        dd('dw');
    //    }
    
        
    }

    public function registersubmit(createRequest $req){
        //$res1 = User::all();
       $res = User::where('email',$req->email)->first();
      // print_r($res);
     // dd($res->email);
     if($res){

     
        if($res->email== $req->email){
         Session::flash('err','email already exists');
         return redirect()->back()->withInput();
          }
        }
       
       $user= new User();
       $user->name=$req->name;
       $user->email=$req->email;
       $user->password=$req->password;
       $user->save();
       Session::flash('msg','user registered');
       return redirect()->back();
       

    }

       public function uploadFile(Request $req)
       {
        
           
           
           if ($req->hasFile('files') == false) {
               return redirect()->back()->with(Session::flash('err', 'choosefile'));
            }
            $filename = $req->file('files')->getClientOriginalName();
            //$e = $req->file('files')->getPathname();
            //dd($e);
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
           // dd($ext);
        //$ext = $req->file('files')->extension();
        $up=new Upload();
        $up->file_name=$filename;
        $up->extn=$ext;
        $up->mime_type=$req->file('files')->extension();
        $up->save();
        
        //$path = $req->file('files')->storeAs($filename, 'public');
        $path = $req->file('files')->move('files',$filename);
        
        if ($path) {
            return redirect()->back()->with(Session::flash('msg', 'file uploaded'));
                                     
            
        } else {
            return redirect()->back()->with(Session::flash('err', 'file not uploaded'));
        }

            
       } 


       public function downloadFile($file_name)
       {  //dd($image_name);
          return response()->download(public_path().'/files/'.$file_name);
       }
}

