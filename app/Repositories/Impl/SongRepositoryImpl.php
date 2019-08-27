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

}
