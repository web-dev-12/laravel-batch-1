<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function signInForm(){
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

        }else{
            
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
            'roleIdentity'  => $uesr->roleIdentity
        ]);
    }
}
