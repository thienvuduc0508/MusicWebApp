<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\SingerRepositoryInterface;
use App\Singer;
use App\Song;

class SingerRepositoryImpl extends EloquentRepository implements SingerRepositoryInterface
{
    public function getModel()
    {
        $model = Singer::class;
        return $model;
    }

    public function listSingers($userId)
    {
        $singers = $this->model->where('user_id', '=', $userId)->get();
        return $singers;
    }

    public function addSinger($songId, $singerId)
    {
        $singer = $this->model->find($singerId);
        $singer->songs()->attach($songId);
    }

    public function getSingerIdInSong($songId, $singerId)
    {
        $singer = $this->model->findOrFail($singerId);
        return $singer->songs->pluck('id')->toArray();
    }
}
