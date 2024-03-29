<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function songs(){
        return $this->belongsToMany('App\Song');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
