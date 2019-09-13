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

    public function getNewSongs()
    {
        $newSongs = $this->model->orderby('created_at', 'desc')->paginate(4);
        return $newSongs;
    }

    public function getMostListenSongs()
    {
        $mostListenSongs = $this->model->orderby('view', 'desc')->paginate(4);
        return $mostListenSongs;
    }

    public function getRandomSongs()
    {
        $randomSongs = $this->model->inRandomOrder()->paginate(4);
        return $randomSongs;
    }

    public function getAllNewSongs()
    {
        $newSongs = $this->model->orderby('created_at', 'desc')->get();
        return $newSongs;
    }

    public function getAllMostListenSongs()
    {
        $mostListenSongs = $this->model->orderby('view', 'desc')->get();
        return $mostListenSongs;
    }


}
