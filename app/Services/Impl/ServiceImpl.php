<?php
namespace App\Services\Impl;


use App\Services\ServiceInterface;

class ServiceImpl implements ServiceInterface {

    protected $repository;

    public function getAll()
    {
        return $this->repository->all();
        // TODO: Implement getAll() method.
    }

    public function findById($id)
    {
        return $this->repository->findById($id);
        // TODO: Implement findById() method.
    }

    public function destroy($id)
    {
        $object = $this->repository->findById($id);
        $this->repository->destroy($object);
        // TODO: Implement destroy() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }
}
