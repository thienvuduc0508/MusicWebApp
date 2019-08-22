<?php


namespace App\Services;


interface UserServiceInterface extends ServiceInterface
{
 public function changePassword($id);
 public function updatePassword($request,$id);
}
