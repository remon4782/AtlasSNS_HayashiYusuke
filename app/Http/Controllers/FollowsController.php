<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(){//フォローリスト
        return view('follows.followList');
    }
    public function followerList(){//フォロワーリスト
        return view('follows.followerList');
    }

    //フォローの人数取得
public function follows()
{
    return $this->belongsToMany(User::class,'follows','following_id','followed_id')->whileTimestamps();
}
//フォロワーの人数取得
public function followers()
{
    return $this->belongsToMany(User::class,'follows','following_id','followed_id')->whileTimestamps();
}
}
