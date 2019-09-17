<?php

namespace App\Http\Controllers;

use App\Like;
use App\Services\LikeServiceInterface;
use App\Services\PlaylistServiceInterface;
use App\Services\SongServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    protected $likeService;
    protected $songService;
    protected $playlistService;

    public function __construct(LikeServiceInterface $likeService,
                                SongServiceInterface $songService,
                                PlaylistServiceInterface $playlistService)
    {
        $this->likeService = $likeService;
        $this->songService = $songService;
        $this->playlistService = $playlistService;
    }

    public function likeSong($songId)
    {
        $this->likeService->likeSong($songId);
        $this->addLikeToSong($songId);
        return redirect()->back();
    }

    public function dislikeSong($songId)
    {
        $this->likeService->dislikeSong($songId);
        $this->subLikeToSong($songId);
        return redirect()->back();
    }

    public function likePlaylist($PlaylistId)
    {
        $this->likeService->likePlaylist($PlaylistId);
        $this->addLikeToPlaylist($PlaylistId);
        return redirect()->back();
    }

    public function dislikePlaylist($PlaylistId)
    {
        $this->likeService->dislikePlaylist($PlaylistId);
        $this->subLikeToPlaylist($PlaylistId);
        return redirect()->back();
    }

    public function addLikeToSong($songId)
    {
        $songs = $this->songService->findById($songId);
        $songs->like += 1;
        $songs->save();
    }
    public function subLikeToSong($songId)
    {
        $songs = $this->songService->findById($songId);
        $songs->like -= 1;
        $songs->save();
    }
    public function addLikeToPlaylist($playlistId)
    {
        $playlist = $this->playlistService->findById($playlistId);
        $playlist->like += 1;
        $playlist->save();
    }
    public function subLikeToPlaylist($playlistId)
    {
        $playlist = $this->playlistService->findById($playlistId);
        $playlist->like -= 1;
        $playlist->save();
    }
}
