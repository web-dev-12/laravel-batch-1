<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

//Custom Response Message
use App\Http\Traits\ResponseTrait;

class AuthenticationController extends Controller
{
    use ResponseTrait; 
    public function signInForm(){
       /*echo '<pre>';
        print_r(request()->session());
        echo '</pre>';
        die;*/
        return view('authentication.login');
    }
    public function signIn(Request $request){
        $request->validate(
            ['username' => 'required',
            'password'  => 'required',
            ]
        );
        //print_r($request->toArray());
        if(!!$this->validUser($request)){
            return redirect(route($this->validUser($request)->roleIdentity.'Dashboard'))->with($this->responseMessage(true,null,'Login Success'));//superadminDashboard|userDashboard
        }else{
            return redirect(route('signInForm'))->with($this->responseMessage(false,'error','Invalid Email Or Password'));
        }
    }
    protected function validUser($request){
        return $this->verifyUser($request);
    }
    protected function verifyUser($request){
        $user = User::join('roles','roleId', '=', 'roles.id')
                ->select('users.id as userId','users.username','users.name','users.email','users.mobileNumber','roles.type as roleType','roles.id as roleId','roles.identity as roleIdentity')
                ->where(['users.mobileNumber' => $request->username, 'users.password' => md5($request->password), 'users.status' => 1])
                ->orWhere(function($query) use ($request){
                    $query->where(['users.email' => $request->username, 'users.password' => md5($request->password), 'users.status' => 1]);
                })->first();
                !!$user && $this->setSession($user);
                return $user;
        //dd($user);        
    }
    protected function setSession($user){
        return request()->session()->put([
            'user'          => $user->userId,
            'username'      => $user->username,
            'name'          => $user->name,
            'email'         => $user->email,
            'mobileNumber'  => $user->mobileNumber,
            'roleId'        => $user->roleId,
            'roleIdentity'  => $user->roleIdentity
        ]);
    }

    public function signUpForm(){
        return view('authentication.signUp');
    }


    public function signUp(Request $request){    

        $request->validate([
            'name'              => 'required',
            'username'          => 'required|unique:users,username',
            'email'             => 'required',
            'mobileNumber'      => 'required',
            'password'          => 'required',
            'password'          => 'required',
            'password_confirm'  => 'required|same:password'
        ]);

        $user                   = new User();
        $user->name             = $request->name;
        $user->username         = $request->username;
        $user->email            = $request->email;
        $user->mobileNumber     = $request->mobileNumber;
        $user->password         = md5($request->password);
        
        $user->roleId           = 2;
        
        $user->save(); 
        
        return redirect(route('signInForm'))->with($this->responseMessage(true,null,'User Profile Created Successfully'));
    }

    public function signOut(){
        request()->session()->flush();
        return redirect(route('signInForm'))->with($this->responseMessage(true,'error','Logged Out Successfully!'));
    }
}
