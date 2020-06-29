<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\PostView;
use App\User;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $post = new Post();
        $post->message = request('message');
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/home');
    }
    public function showall($id=null){
        if($id == null){
            $postall = PostView::all();
        }
        else{
            $postall = PostView::where('user_id', '=', $id)->get();
        }
        $userall = User::all();
        return view('home',compact('postall'),compact('userall'));
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
