<?php

namespace App;

use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    // use CanBeLiked;
    // protected $fillable = ['ttile']

    protected $appends = ['liked_by_auth_user', 'belongs_to_user'];
    protected $fillable = ['body', 'user_id'];


    public function getLikedByAuthUserAttribute()
    {
        $userId = auth()->user()->id;

        $like = $this->likes->first();
        // dd($like);
        if ($like) {
            return true;
        }
        return false;
    }

    public function getBelongsToUserAttribute()
    {
        return $this->user_id == auth()->user()->id;
    }



    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
        // return $this->hasMany('App\Like','likeable_id','likeable_type','id');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
