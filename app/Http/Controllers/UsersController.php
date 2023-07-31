<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }

    //ユーザー検索ページへ遷移するリンク
    public function index() {
        $users = User::all();
        return view('index')->with('users', $users);
    }

    //public function search (Request $request) {
    //$users = User::paginate(20);//ユーザー一覧をページネートで取得
    //$search = $request->input('search');//検索フォームで入力された値を取得する
    //$query = User::query();//クエリビルダ


    //もし検索フォームにキーワードが入力されたら
    //if ($search) {
    //$spaceConversion = mb_convert_kana($search, 's');//全角スペースを半角に変換
    //$wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
    //単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）

    //foreach($wordArraySearched as $value) { {// 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
        //$query->where('name', 'like', '%'.$value.'%');
    //}
    //上記で取得した$queryをページネートにし、変数$usersに代入
        //$users = $query->paginate(20);


    // ビューにusersとsearchを変数として渡す
    //return view('users.index')
        //->with([
            //'users' => $users,
            //'search' => $search,
            //]);
    //}
//}

}
