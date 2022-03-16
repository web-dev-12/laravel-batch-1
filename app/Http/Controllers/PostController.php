<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function viewPosts(){
        return view('posts/all');
    }
    public function addPost(){
        return view('posts/add');
    }
}
