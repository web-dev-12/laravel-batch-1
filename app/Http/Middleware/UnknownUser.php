<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UnknownUser
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
        if(Session::has('user') && Session::get('user') != null){
            $user = User::find(Session::get('user'));
            if(!!$user){
                return redirect(route(Session::get('roleIdentity').'Dashboard'));
            }else{
                return redirect(route('login'))->with($this->responseMessage(false,'error','You have to login first'));
            }
        }
        return $next($request);
    }
}
