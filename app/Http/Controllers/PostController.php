<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function viewPosts(){
        $posts = Post::all();
        echo '<pre>';
        print_r($posts->toArray());
        echo '</pre>';
        //return view('posts/all',compact('posts'));
    }
    public function addPost(){
        return view('posts/add');
    }
    public function savePost(Request $request){
        //print_r($request->all());
        $post = new Post();
        $post->blogName = $request->blogName;
        $post->blogDes  = $request->blogDes;
        $post->save();
        return redirect(route('all.posts'));
    }
}
