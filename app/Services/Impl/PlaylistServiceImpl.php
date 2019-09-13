<?php


namespace App\Services\Impl;


use App\Playlist;
use App\Repositories\PlaylistRepositoryInterface;
use App\Repositories\SongRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\PlaylistServiceInterface;
use Illuminate\Support\Facades\Session;


class PlaylistServiceImpl extends ServiceImpl implements PlaylistServiceInterface
{
    protected $userRepository;
    protected $songRepository;

    public function __construct(PlaylistRepositoryInterface $playlistRepository,
                                UserRepositoryInterface $userRepository,
                                SongRepositoryInterface $songRepository)
    {
        $this->repository = $playlistRepository;
        $this->userRepository = $userRepository;
        $this->songRepository = $songRepository;
    }

    public function create($request)
    {
        $playlist = new Playlist();
        $playlist->name = $request->name;
        $playlist->user_id = $request->user_id;
        $playlist->description = $request->description;
        $playlist->status = $request->status;
        $this->repository->create($playlist);

    }

    public function update($request, $id)
    {
        $playlist = $this->repository->findById($id);
        $playlist->name = $request->name;
        $playlist->description = $request->description;
        $playlist->status = $request->status;
        $this->repository->update($playlist);

    }

    public function addSong($playlistId, $songId)
    {
        $playlistSongIds = $this->getSongIdsPlaylist($playlistId, $songId);
        if (!in_array($songId, $playlistSongIds)) {
            $this->repository->addSong($playlistId, $songId);

            return true;
        }

        return false;
    }

    public function getSongIdsPlaylist($playlistId, $songId)
    {

        $playlistIds = $this->repository->getSongIdsInPlaylist($playlistId, $songId);
        return $playlistIds;
    }

    public function playlists($userId)
    {
        $playlists = $this->repository->playlists($userId);
        return $playlists;
    }

    public function getAllNewPlaylists()
    {
        return $this->repository->getAllNewPlaylists();
    }

    public function deleteSongInPlaylist($playlistId, $songId)
    {
        $this->repository->deleteSongInPlaylist($playlistId, $songId);

    }

}
