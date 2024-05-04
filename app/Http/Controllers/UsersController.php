<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

        //ユーザー検索の処理をする
    public function search(){
        $users = User::paginate(20);
        return view('users.search')->with('users',$users);

    }

    //ユーザー検索の処理を実装する
    public function searchView(Request $request){
        //$users=User::paginate(20);
        $keyword=$request->input('searchWord');
        $query=User::query();
        if(!empty($keyword)){
            $query->orwhere('username','like','%',$keyword,'%')->get();
        }

        //全件取得+ページネーション
        $data=$query->orderBy('created_at','desc')->paginate(5);
        return view('users.search')->with('data',$data)->with('keyword',$keyword)->with('users',$users)->with('query,$query');
    }

    //ユーザー検索ページへ遷移するリンク
    public function index() {
        $users = User::all();
        return view('index')->with('users', $users);
    }

}
