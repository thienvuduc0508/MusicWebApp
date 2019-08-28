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

    public function changePassword($id)
    {
        // TODO: Implement changePassword() method.
        return $this->model->findOrFail($id);
    }

    public function updatePasword($object)
    {
        // TODO: Implement updatePasword() method.
        $object->save();
    }

    public function updatePassword($object)
    {
        // TODO: Implement updatePassword() method.
    }
}
