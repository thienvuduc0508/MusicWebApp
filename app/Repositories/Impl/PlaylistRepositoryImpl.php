<?php


namespace App\Repositories\Impl;


use App\Playlist;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\PlaylistRepositoryInterface;

class PlaylistRepositoryImpl extends EloquentRepository implements PlaylistRepositoryInterface
{
    public function getModel()
    {
        $model = Playlist::class;
        return $model;
    }

    public function addSong($playlistId, $songId)
    {
        $playlist = $this->model->findOrFail($playlistId);
        $playlist->songs->attach($songId);
    }
}
