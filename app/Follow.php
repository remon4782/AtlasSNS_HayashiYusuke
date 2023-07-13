<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //中間テーブルでフォロー機能
    //protected $fillable = ['user_id', 'follower_id'];

    protected $fillable = ['following_id', 'followed_id'];

    public function followingIds(Int $user_id)
  {
      return $this->where('following_id', $user_id)->get();
  }

}
