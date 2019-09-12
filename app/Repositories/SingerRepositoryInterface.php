<?php


namespace App\Repositories;


interface SingerRepositoryInterface extends RepositoryInterface
{
    public function listSingers($userId);

    public function addSinger($songId, $singerId);

    public function getSingerIdInSong($songId, $singerId);

}
