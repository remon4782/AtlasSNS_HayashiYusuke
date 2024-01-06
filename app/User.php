<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //post_tableとのリレーション
    public function post(){
        return $this->hasMany('App\Post');
    }

    //ユーザーがフォローしている人数の取得（フォロー）
    public function follows()//belongsToManyは多対多を使用
    {
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');
    }
    //ユーザーをフォローしている人数取得（フォロワー）
    public function followers(){
        return $this->belongsToMany(User::class,'followers','following_id','followed_id');
    }

    //フォローの人数取得
    public function isFollowing($user_id){
        return (boolean) $this->follows()->where('followed_id', $user_id)->first();
    }

//フォロワーの人数取得
    public function isFollowed($user_id){
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['follows.id']);
    }

//フォロー解除
    public function unfollows(Int $user_id){
        return $this->follows()->detach($user_id);
    }

//フォロー
    public function follow(Int $user_id){
        return $this->follows()->attach($user_id);
    }

}


//public function follow_each() { //ユーザがフォロー中のユーザを取得
     //$userIds = $this->followings()->pluck('users.id')->toArray();
    //相互フォロー中のユーザを取得
      //$follow_each = $this->followers()->whereIn('users.id', //$userIds)->pluck('users.id')->toArray();
    //相互フォロー中のユーザを返す
       // return $follow_each;
//}

//public function isFollowing(Int $user_id){
    //return (boolean) $this->follows()->where('followed_id',//$user_id)->first(['id']);
//}
