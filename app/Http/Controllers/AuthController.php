<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    public function set(Request $r){
        $r->session()->put('username','tawhid');
        echo 'Value set';
    }
    public function get(Request $r){
        $username = $r->session()->get('username');
        echo $username;
    }
    public function check(Request $r){
        if($r->session()->has('username')){
            echo "Session Exists";
        }else{
            echo "Session Expaired";
        }
    }
    public function session_destroy(){
        Session::flush();
    }
    public function  userLogin(){
        return view('login');
    }
    public function userLoginPost(Request $request){
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );
        $email = $request->email;
        $password = $request->password;
        if($email == 'admin@gmail.com' && $password == '123456'){
            $request->session()->put('email',$email);
            echo 'session Stored';
        }else{
            $request->session()->flash('error','Your email and Password not matched!!');
            return redirect(route('login'));
        }
    }
}
