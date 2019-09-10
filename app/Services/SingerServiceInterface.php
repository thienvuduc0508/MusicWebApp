<?php


namespace App\Services;


interface SingerServiceInterface extends ServiceInterface
{
public function listSingers($userId);
}
