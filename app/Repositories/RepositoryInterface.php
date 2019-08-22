<?php


namespace App\Repositories;


interface RepositoryInterface
{
public function getAll();
public function findById($id);
public function create($object);
public function update($object);
public function destroy($object);
}
