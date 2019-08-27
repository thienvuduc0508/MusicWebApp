<?php


namespace App\Repositories;


interface SongRepositoryInterface extends RepositoryInterface
{
public function listSong($userId);
}
