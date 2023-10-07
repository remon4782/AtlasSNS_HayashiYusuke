<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //投稿フォーム作成時記入
     protected $fillable = [
      'user_id', 'post',
  ];

    //
    public function getTimeLines(Int $user_id, Array $follow_ids)
    {
        $follow_ids[] = $user_id;
        return $this->whereIn('user_id', $follow_ids)->orderBy('created_at', 'ASC')->paginate();
    }

    //user_tableとリレーション
    public function User(){
        return $this->belongsTo('App\User');
    }
}
