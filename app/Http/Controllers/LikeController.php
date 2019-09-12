<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function createLike($songId)
    {
       $like = new Like();
        $like->user_id = Auth::id();
        $like->song_id = $songId;
        $like->save();
        return redirect()->back();
    }
    public function dislike($songId){

        Like::where("song_id",$songId)->where('user_id',Auth::id())->delete();
        return redirect()->back();
    }
}
