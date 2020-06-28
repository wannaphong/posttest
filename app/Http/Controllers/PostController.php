<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function create()
    {
        $post = new Post();
        $post->message = request('message');
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/home');
    }
    public function showall(){
        $postall = Post::all();
        return view('home',compact('postall'));
    }
    public function del($id){
        Post::Where("postid","=",$id)->delete();
        return redirect('/home');
    }
    public function get_data2update($id){
        $post = Post::Where("postid","=",$id)->first();
        return view('edit',compact('post'));
    }
    public function update_data(Request $request, $id){
        $storeData = $request->all();
        Post::Where("postid","=",$id)->update($storeData);
        return redirect('/home');
    }
}
