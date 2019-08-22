<?php
namespace App\Repositories\Impl;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\Eloquent\EloquentRepository;
use App\User;

class UserRepositoryImpl extends EloquentRepository implements UserRepositoryInterface {
public function getModel()
{
    // TODO: Implement getModel() method.
    $model = User::class;
    return $model;
}
}
