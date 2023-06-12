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
