<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function likes() {
        return $this->hasOne('\App\Profile');
    }
    // protected fillable = ['user_id', 'body'];
    //
    // protected fillable = ['user_id', 'body'];

    public function profile() {
        return $this->hasOne('\App\Profile');
    }
    public function comment() {
        return $this->hasMany('\App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function likeable() {
        return $this->morphTo();

    }
    public function tweet() {
        return $this->belongsTo('App\Tweet','tweet_id','id');
    }
}
