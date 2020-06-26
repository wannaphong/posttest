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
        return redirect('/');
    }
}
