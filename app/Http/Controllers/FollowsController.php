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
    //public function follow(Request $request){
        //$user_id = Auth::user()->id;
    //}

    //フォロー
    public function follow(Post $post, Follow $follow)
    {
        $user = auth()->user();
        $follow_ids = $follow->followingIds($user->id);
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $timelines = $post->getTimelines($user->id, $following_ids);
        return view('follows.followList',['timelines' => $timelines]);
    }

    //フォロワー
    public function followList(Post $post, Follow $follow)
    {
        $user = auth()->user();
        $follow_ids = $follow->followingIds($user->id);
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        $timelines = $post->getTimelines($user->id, $following_ids);
        return view('follows.followList',['timelines' => $timelines]);
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
