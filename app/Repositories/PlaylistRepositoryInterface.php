<?php


namespace App\Repositories;


interface PlaylistRepositoryInterface extends RepositoryInterface
{
public function addSong($playlistId, $songId);
public function playlists($userId);
public function deleteSongInPlaylist($playlistId,$songId);
public function getSongIdsInPlaylist($playlistId,$songId);
public function deleteSongOfPlaylist($playlistId,$songId);
}
