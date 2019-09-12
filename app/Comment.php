<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function song(){
        return $this->belongsTo(Song::class);
    }
    public function playlist(){
        return $this->belongsTo(Playlist::class);
    }
    public function singer(){
        return $this->belongsTo(Singer::class);
    }
}
