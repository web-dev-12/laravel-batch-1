<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function get(Request $r){
        $username = $r->session()->get('username');
        echo $username;
    }
}
