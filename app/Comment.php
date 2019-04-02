<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function tweet() {
        return $this->belongsTo('\App\Tweet');
    }
    public function user() {
        return $this->belongsTo('\App\User');
    }
    public function likes() {
        return $this->morphMany('\App\Like', 'likeable');
    }
    public function getBelongsToUserAttribute()
    {
        return $this->user_id == auth()->user()->id;
    }

}
