<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function viewPosts(){
        $posts = Post::all();
        /*echo '<pre>';
        print_r($posts->toArray());
        echo '</pre>';*/
        return view('posts/all',compact('posts'));
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
    public function editPost($id){
        $post = Post::find($id);
        return view('posts/edit',compact('post'));
    }
    public function updatePost(Request $request, $id){
        $post = Post::find($id);
        $post->blogName = $request->blogName;
        $post->blogDes  = $request->blogDes;
        $post->save();
        return redirect(route('all.posts'));
    }
    public function deletePost($id){
        $post = Post::find($id);
        $post->delete();
        return redirect(route('all.posts'));
    }
}
