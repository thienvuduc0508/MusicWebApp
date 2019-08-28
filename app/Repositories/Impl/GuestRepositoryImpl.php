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
}
