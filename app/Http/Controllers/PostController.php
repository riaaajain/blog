<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->desc  = $request->descrption;
        $post->user_id = auth()->user()->id;
        $post->save();
        // echo $title ."<br>";
        // echo $desc ."<br>";
        return redirect()->route('post.myposts');
    }
    public function myposts()
    {
        $user_id = auth()->user()->id;
        $posts = Post::where('user_id', $user_id)->orderBy('id','desc')->get();
        return view('posts.myposts', compact('posts'));
    }
    public function feed()
    {
        $user_id = auth()->user()->id;
        $posts = Post::where('user_id','!=' , $user_id)->orderBy('id','desc')->get();
        return view('posts.feed', compact('posts'));
    }
    public function delete($post_id)
    {
       $user_id = auth()->user()->id;
       $post = Post::find($post_id);
       if($post->user_id == $user_id)
       {
            $post->delete();
       }
       return redirect()->route('post.myposts');
    }
    public function edit($post_id)
    {
        $user_id = auth()->user()->id;
        $post = Post::find($post_id);
        if($post->user_id == $user_id)
       {

           return view('posts.edit', compact('post'));
          
       }
           
       else{
            return redirect()->route('post.myposts');
       }
    }
    public function update(Request $request, $post_id)
    {
        $user_id = auth()->user()->id;
        $post = Post::find($post_id);
        if($post->user_id == $user_id)
       {
           $post->title = $request->title;
           $post->desc = $request->description;
           $post->save(); 
       }
        return redirect()->route('post.myposts');
    }
}
