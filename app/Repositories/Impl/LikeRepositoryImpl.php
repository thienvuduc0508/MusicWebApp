<?php

namespace App\Repositories\Impl;

use App\Like;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\LikeRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LikeRepositoryImpl extends EloquentRepository implements LikeRepositoryInterface
{
    public function getModel()
    {
        $model = Like::class;
        return $model;
    }

    public function likeSong($songId)
    {
        $like = new $this->model;
        $like->user_id = Auth::id();
        $like->song_id = $songId;
        $like->save();
    }

    public function dislikeSong($songId)
    {
    $this->model->where("song_id",$songId)->where('user_id',Auth::id())->delete();
    }

    public function likePlaylist($playlistId)
    {
        $like = new $this->model;
        $like->user_id = Auth::id();
        $like->playlist_id = $playlistId;
        $like->save();

    }

    public function dislikePlaylist($playlistId)
    {
        $this->model->where("playlist_id",$playlistId)->where('user_id',Auth::id())->delete();
    }
}
