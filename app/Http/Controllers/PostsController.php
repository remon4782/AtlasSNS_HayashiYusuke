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
        $list = Post::orderBy('created_at','desc')->get();
       // $username = Auth::user()->username;//現在認証しているユーザー名を取得
        //$user = Auth::user();//ログイン認証しているユーザー名の情報取得
        return view('posts.index',['list'=>$list]);//Postsファイルのindexを見せる
    }

    //投稿機能
    public function create(Request $request){
        $post = $request->input('newPost');//index.bladeの投稿ボタンで送られたpostをnewpostとして保存する。
        $user_id = Auth::user()->id;//ログインしているユーザーをuser_idとして取得する。
        //ddd($user_id);//
        Post::create([
            'post' => $post,
            'user_id' => $user_id]);//1行追加でも可
    return redirect('/top');//トップを表示させる処理を行う
    }

    //投稿の編集
    //public function update(Request $request, Post $post){
        //$id= $request->input('id');
       // $up_post = $request->input('update');
        //$post = \DB::table('posts')
            //->where('id',$request->id)
            //->update(['post' => $up_post]);
       // return redirect ('/top');
   // }

    public function update(Request $request){
        $form = $request->input('upPost');
        $id = $request->input('post_id');
        Post::where('id',$id)->update(['post' => $form]);
        return redirect('/top');
    }

    //削除
    public function delete($id){//つぶやきのIDが$idに入る
        $post = Post::where('id',$id)->delete();
        return redirect('/top');//トップに戻る記述
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
