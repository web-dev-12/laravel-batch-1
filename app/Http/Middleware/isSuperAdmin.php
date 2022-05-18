<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Session;

class isSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::has('user') || Session::get('user') == null || !Session::has('roleId')){
            echo 'failed';
        }else{
            $user = User::find(Session::get('user'));
            $role = Role::find(Session::get('roleId'));
            if(!$user || !$role){
                echo  'no user or role';
            }elseif($role->identity !='superadmin'){
                return redirect(route($role->identity.'Dashboard'))->with($this->responseMessage(true,null,'Access Deined'));
            }else{
                return $next($request);
            }
        }
        return redirect()->route('logout');
    }
}
