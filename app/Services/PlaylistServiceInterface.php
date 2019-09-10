<?php


namespace App\Services;


interface PlaylistServiceInterface extends ServiceInterface
{
    public function addSong($playlistId, $songId);
    public function playlists($userId);
    public function getAllNewPlaylists();
    public function deleteSongInPlaylist($playlistId,$songId);
    public function deleteSongOfPlaylist($playlistId,$songId);
    public function getSongIdsPlaylist($playlistId,$songId);

}
