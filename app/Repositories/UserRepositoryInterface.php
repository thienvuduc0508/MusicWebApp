<?php


namespace App\Repositories;


interface UserRepositoryInterface extends RepositoryInterface
{
    public function changePassword($id);
    public function updatePasword($object);

}
