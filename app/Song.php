<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function user(){
     return $this->belongsTo('App\User');
    }
    public function playlists(){
        return $this->belongsToMany('App\Playlist');
    }
    public function singers(){
        return $this->belongsToMany('App\Singer');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
