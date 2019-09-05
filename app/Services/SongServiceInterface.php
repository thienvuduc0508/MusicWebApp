<?php


namespace App\Services;


interface SongServiceInterface extends ServiceInterface
{
    public function listSong($userId);
    public function findByName($keyword);
    public function getSongsInPlaylist($playlist);
}
