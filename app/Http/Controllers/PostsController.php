<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostsController extends Controller
{
    //auth認証
    public function _construct()
    {
        $this->middleware('auth');
    }

    //投稿を表示する
    public function index()//投稿の呟きを表示させるためにindexメゾットの内容を書き換える必要がある。
    {
        $username = Auth::user()->username;//現在認証しているユーザー名を取得
        $user = Auth::user();//ログイン認証しているユーザー名の情報取得
        return view('posts.index');//Postsファイルのindexを見せる
    }

    //投稿機能
    public function create(Request $request){
        $post = $request->input('newPost');
        $user_id = $request->input('user_id');
        Post::create([
            'post' => $post,
            'user_id' => $user_id]);//1行追加でも可
        return redirect('index');
    }

    //投稿の編集
    public function update($id){
        $post = Post::where('id',$id)->first();
        return view('/top',['post'=>$post]);
    }

    //削除
    public function delete($id){
        $post = Post::where('id',$id)->delete();
        return redirect('/top');
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
