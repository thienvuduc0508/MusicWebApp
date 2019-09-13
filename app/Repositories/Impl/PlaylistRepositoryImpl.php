<?php


namespace App\Repositories\Impl;


use App\Playlist;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\PlaylistRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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
        $playlist->songs()->attach($songId);
    }

    public function playlists($userId)
    {
        $playlists = $this->model->where('user_id', '=', $userId)->get();
        return $playlists;
    }

    public function getAllNewPlaylists()
    {
        $newPlaylits = $this->model->orderby('created_at', 'desc')->get();
        return $newPlaylits;
    }

    public function deleteSongInPlaylist($playlistId, $songId)
    {
        $playlist = $this->model->findOrFail($playlistId);
        $playlist->songs()->detach($songId);
    }

    public function getSongIdsInPlaylist($playlistId, $songId)
    {
        $playlist = $this->model->findOrFail($playlistId);
        return $playlist->songs->pluck('id')->toArray();
    }
    public function get4MostListenPlaylist(){
        $most4ListenPlaylist = $this->model->orderby('view','desc')->paginate(4);
        return $most4ListenPlaylist;
    }
    public function getAllMostListenPlaylist(){
        $mostListenPlaylist = $this->model->orderby('view','desc')->get();
        return $mostListenPlaylist;
    }
}
