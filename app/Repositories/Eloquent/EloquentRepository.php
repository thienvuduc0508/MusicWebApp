<?php

namespace App\Repositories\Eloquent;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    abstract public function getModel();


    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function __construct()
    {
        $this->setModel();
    }

    public function getAll()
    {
        $result = $this->model->all();
        return $result;
        // TODO: Implement getAll() method.
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($object)
    {
        $object->save();
    }

    public function update($object)
    {
        $object->save();
    }

    public function destroy($object)
    {
        $object->delete();
    }
}
