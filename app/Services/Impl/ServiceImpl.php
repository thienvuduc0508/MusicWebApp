<?php
namespace App\Services\Impl;


use App\Services\ServiceInterface;

class ServiceImpl implements ServiceInterface {

    protected $repository;

    public function getAll()
    {
        return $this->repository->getAll();
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
    }

    public function update($request, $id)
    {

    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }
}
