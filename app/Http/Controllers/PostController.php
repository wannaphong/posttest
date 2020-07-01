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
        $post->user_id = Auth::id(); // ดึง ID user
        $post->save();
        return redirect('/home');
    }
    public function find(Request $request){
        $find = $request->find;
        $user_id = $request->user_id;
        if($user_id=='all')
        {
            $postall = PostView::where('message','like', '%'. $find.'%')->paginate(5);
        }
        else
        {
            $postall = PostView::where([['message','like', '%'. $find.'%'],['user_id','=',$user_id]])->paginate(5);
        }
        $userall = User::all();
        if($postall->isEmpty()) // เช็กถ้าว่าง
        {
            $message = 'ไม่พบข้อมูล '.$find;
            return view('home',[
                                'message'=>$message,
                                'userall'=>$userall,
                                'postall'=>$postall
                                ]); // กรณีคืนค่า compact มากกว่าา 2 ตัวแปร ต้องใช้ array
        }
        else if($user_id!='all'){
            //dd($user_id);

            return view('home',compact('postall'),compact('userall'));
        }
        else{
            return view('home',compact('postall'),compact('userall'));
        }
    }
    public function showall($id=null){
        if($id == null){
            $postall = PostView::paginate(5);
        }
        else{
            $postall = PostView::where('user_id', '=', $id)->paginate(5);
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
