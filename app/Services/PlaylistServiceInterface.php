<?php


namespace App\Services;


interface PlaylistServiceInterface extends ServiceInterface
{
    public function addSong($playlistId, $songId);
}
