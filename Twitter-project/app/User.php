<?php

namespace App;

use Overtrue\LaravelFollow\Traits\CanLike;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile() {
        return $this->hasOne('\App\Profile');
    }
    public function likes() {
        return $this->hasMany('\App\Like');
    }
    public function tweets() {
        return $this->hasMany('\App\Tweet');
    }
    public function comments() {
        return $this->hasMany('\App\Comment');
    }
    public function posts() {
        return $this->hasMany('App\Post');
    }
    public function following() {
        return $this->belongsToMany('App\User', 'followers','follower_id', 'leader_id');
    }
    public function followers() {
        return $this->belongsToMany('App\User', 'followers', 'leader_id', 'follower_id');
    }
}
