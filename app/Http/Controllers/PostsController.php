<?php

namespace App\Http\Controllers;
use Illuminate\App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //auth認証
    public function _construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $username = Auth::user()->username;//現在認証しているユーザー名を取得
        $user = Auth::user();//ログイン認証しているユーザー名の情報取得
        return view('posts.index');//現在認証しているユーザー取得
    }

    //投稿を表示
    public function create(){
        return view('post/create');
    }

    //投稿機能
    public function store(Request $request){
        $post = $request->input('newPost');
        Post::create(['post' => $post]);
        return redirect('index');
    }


    //投稿フォーム
    //public function createForm(Request $request){
       // $id = Auth::id();
        //$post = $request->input('newPost');
        //\DB::table('posts')->insert([
        //    'post'=>$post,
        //    'user_id'=>$id
       // ]);
        //return view('posts.createForm');
    //}
        }
