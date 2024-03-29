<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\SongRepositoryInterface;
use App\Song;

class SongRepositoryImpl extends EloquentRepository implements SongRepositoryInterface
{
    public function getModel()
    {
        $model = Song::class;
        return $model;
    }

    public function listSong($userId)
    {
        $list = $this->model->where('user_id', '=', $userId)->get();
        return $list;
    }

    public function getSongsInPlaylist($playlist)
    {
        return $playlist->songs()->paginate(4);
    }

    public function getMostLikeSongs()
    {
        $mostLikeSongs = $this->model->orderby('like', 'desc')->get();
        return $mostLikeSongs;
    }
}
