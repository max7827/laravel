<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoCreateRequest;

class TodoController extends Controller
{   

   
    public function index()
    {
        $data = Todo::orderBy('created_at', 'desc')->get();
        return view('todos.index', ['data' => $data]);
        //  or  return view('todos.index',compact('data'));
    }



    public function updateTodo($id, TodoCreateRequest $req)
    {

        $s = Todo::find($id)->update(['title' => $req->title]);

        return redirect()->back()->with('msg', "todo updated");
    }

    public function edit($id)
    {  //dd($id);
        $data = Todo::select()->where('id', $id)->get();
        //dd($data); 
        return view('todos.edit', ['data' => $data]);
        //  or  return view('todos.index',compact('data'));
    }

    public function delete($id)
    {  //dd($id);
        $data = Todo::find($id)->delete();
        //dd();
        //dd($data); 
        return redirect()->back();
        //  or  return view('todos.index',compact('data'));
    }

    public function create()
    {  // $data=Todo::orderBy('created_at','desc')->get();
        //dd($data);
        return view('todos.create');
    }

    public function store(TodoCreateRequest $req)
    {

        // $valid=Validator::make($req->all(),$rules,$message);



        // if (!$req->title) {

        //     return redirect()->back()->with('err','choosefile');
        // }

        // dd($req); 
        Todo::create($req->all());

        return redirect()->back()->with('msg', "todo created");
    }



    public function gofileload()
    {
        return view('todos.gofile');

        //return view('todos.gofile',['response'=> $e]);
    }


    public function gofilesubmit(Request $req)
    {
        if (!$req->hasFile('files')) {
            return redirect()->back()->with('err', 'choosefile');
        }
        
          $filename = $req->file('files')->getClientOriginalName();
          $ext = $req->file('files')->extension();
          $tmp = $req->file('files')->getPathName();
         // $f = $req->file('files');
          // dd($s);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiv2.gofile.io/getServer",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
        $q = json_decode($response);
        foreach ($q as $s) {
        }
        $server = $s->server;

  
      

        //$path = $req->file('files');
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://" . $server . ".gofile.io/upload",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('filesUploaded'=> new \CURLFILE($tmp,$ext,$filename)),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


      
        if($response){
        //dd($response);
        $q = json_decode($response);
        foreach ($q as $s) {
        }
         $code = $s->code;
       
        $s=array(
           'filename'=>$filename =$req->file('files')->getClientOriginalName(),
            'ext'=>$ext = $req->file('files')->extension(),
            'tmo'=>$tmp = $req->file('files')->getPathName(),
            'code'=>$code,
            'server'=>$server);
          
         
            
          //$this->gofiledownload($this->code,$this->server);
          \Session::put('data',$s);
        return redirect('/todos/gofiledownload/'.$code);
       // return redirect('')->back()->with('msg',"file uploaded");

        }
        
            return redirect()->back()->with('err','file not uploaded');
        
    }

    public function gofiledownload($code)
    {    $data=\Session::get('data');
       // dd($data);
      $url="https://gofile.io/d/".$data['code'];
      //dd($url);
    //   $downloadUrl="https://".$data['server'].".gofile.io/download/".$data['code']."/".$data['filename'];
    //   dd($downloadUrl);
    \Session::flash('msg','file uploaded');
       return view('todos.gofile2',['url'=>$url]);
    }   
}
