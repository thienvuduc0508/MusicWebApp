<?php


namespace App\Repositories;


interface PlaylistRepositoryInterface extends RepositoryInterface
{
public function addSong($playlistId, $songId);
}
