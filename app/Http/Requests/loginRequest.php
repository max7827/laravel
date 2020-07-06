<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {  //dd('jjj');
        return ['email'=>'required|email',
                'password'=>'required|min:3'
    ];
            //
    
    }

    public function messages()
    {
         
       
        return [
            'email.required'=>'email required',
            'email.email'=>'email can be only email',
            'password.required'=>'Password cannot be empty',
            'password.min'=>'Password must be of min 3 characters'
        ];
  
    }
}