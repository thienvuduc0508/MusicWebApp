<?php


namespace App\Services;


interface SongServiceInterface extends ServiceInterface
{
    public function listSong($userId);
    public function getSongsInPlaylist($playlist);
    public function getMostLikeSongs();
}
