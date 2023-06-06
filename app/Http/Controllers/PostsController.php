<?php

namespace App\Http\Controllers;

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
        return view('posts.index');//現在認証しているユーザー取得
        $user = Auth::user();//ログイン認証しているユーザー名の情報取得
        $username = Auth::user()->username;//現在認証しているユーザー名を取得
    }
}
