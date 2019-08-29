<?php

namespace App\Repositories\Impl;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\GuestRepositoryInterface;
use App\Repositories\SongRepositoryInterface;
use App\Song;

class GuestRepositoryImpl extends EloquentRepository implements GuestRepositoryInterface
{
    public function getModel()
    {
        $model = Song::class;
        return $model;
    }
    public function getNewSongs(){
        $newSongs = $this->model->orderby('created_at', 'desc')->paginate(4);
        return $newSongs;
    }
    public function getMostListenSongs(){
        $newSongs = $this->model->orderby('view', 'desc')->paginate(4);
        return $newSongs;
    }
    public function getRandomSongs(){
        $newSongs = $this->model->inRandomOrder()->paginate(4);
        return $newSongs;
    }
}
