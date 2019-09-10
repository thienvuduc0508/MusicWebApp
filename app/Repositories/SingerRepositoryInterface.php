<?php


namespace App\Repositories;


interface SingerRepositoryInterface extends RepositoryInterface
{
public function listSingers($userId);
}
