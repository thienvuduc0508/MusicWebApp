<?php


namespace App\Repositories\Impl;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\SingerRepositoryInterface;
use App\Singer;

class SingerRepositoryImpl extends EloquentRepository implements SingerRepositoryInterface
{
public function getModel()
{
    $model = Singer::class;
    return $model;
}
public function listSingers($userId)
{
    $singers = $this->model->where('user_id','=',$userId)->get();
    return $singers;
}
}
