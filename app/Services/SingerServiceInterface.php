<?php


namespace App\Services;


interface SingerServiceInterface extends ServiceInterface
{
    public function listSingers($userId);
    public function getSingerIdInSong($singerId, $songId);
    public function addSinger($songId, $singerId);
    public function deleteSongInSinger($songId,$singerId);
}
