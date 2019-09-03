<?php


namespace App\Services\Impl;


use App\Playlist;
use App\Services\PlaylistServiceInterface;
use App\Services\SongServiceInterface;
use App\Services\UserServiceInterface;

class PlaylistServiceImpl extends ServiceImpl implements PlaylistServiceInterface
{
    protected $userRepository;
    protected $songRepository;

    public function __construct(PlaylistServiceInterface $playlistService,
                                UserServiceInterface $userService,
                                SongServiceInterface $songService)
    {
        $this->repository = $playlistService;
        $this->userRepository = $userService;
        $this->songRepository = $songService;
    }
    public function create($request)
    {
        $playlist = new Playlist();
        $playlist->name = $request->name;
        $playlist->user_id = $request->user_id;
        $playlist->description = $request->description;
        $this->repository->create($playlist);

    }
    public function update($request,$id)
    {
        $playlist = $this->repository->findById($id);
        $playlist->name = $request->name;
        $playlist->description = $request->description;
        $this->repository->update($playlist);

    }

    public function addSong($playlistId, $songId)
    {

    }
}
