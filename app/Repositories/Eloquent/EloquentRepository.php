<?php
namespace App\Repositories\Eloquent;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface{
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
        // TODO: Implement findById() method.
        return $this->model->findOrFail($id);
    }

    public function create($object)
    {
        // TODO: Implement create() method.
        $object->save();

    }

    public function update($object)
    {
        // TODO: Implement update() method.
        $object->save();

    }

    public function destroy($object)
    {
        // TODO: Implement destroy() method.
        $object->save();

    }
}
