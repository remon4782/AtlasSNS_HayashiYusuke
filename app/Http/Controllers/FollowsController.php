<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followList');
    }

    //フ
    public function follow(User $user)
    {
        $follow = auth()->user();
        //フォローしているか
        $is_following = $follower->inFollowing($user->id);
        if($is_following)
        {
            //フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    //フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following)
        {
            //フォローしていれば解除
            $follower->unfollow($user->id);
            return back();
        }
    }

    //public function followList(){//フォローリスト
        //return view('follows.followList');
   // }
    //public function followerList(){//フォロワーリスト
        //return view('follows.followerList');
    //}

    //フォロー機能
    ///public function follow(User $user){
        ///$follower = Auth::user();
        ///$is_following =$follower->isFollowing($user->id);//// フォローしているか
        ///if($is_following) {// フォローしていなければフォローする
           /// $follower ->follow($user->id);
            ///return back();
        ///}///
   /// }
    //フォロー解除機能
    ///public function nufollow(User $user){
        ///$follower = Auth::user();
        ///$is_following = $follower->isFollowing($user->id);// フォローしているか
        ///if($is_following) {// フォローしていればフォローを解除する
           /// ///$follower ->nofollow($user->id);
            ///return back();
        ///}
    //}

    //public function show(User $user){
        //$login_user = auth()->user();

        //return view('users,show',[
            //'user'           => $user,
           // 'is_following'   => $is_following,
            //'is_followed'    => $is_followed,
            //'follow_count'   => $follow_count,
            //'follower_count' => $follower_count
        //]);
       // }
}
