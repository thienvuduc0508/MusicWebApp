<?php

namespace App\Http\Controllers;

use App\Services\CommentServiceInterface;
use App\Services\PlaylistServiceInterface;
use App\Services\SongServiceInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;
    protected $songService;
    protected $playlistService;

    public function __construct(CommentServiceInterface $commentService,
                                SongServiceInterface $songService,
                                PlaylistServiceInterface $playlistService)
    {
        $this->commentService = $commentService;
        $this->songService = $songService;
        $this->playlistService = $playlistService;
    }

    public function createCommentInSong(Request $request, $songId)
    {
        $song = $this->songService->findById($songId);
        $this->commentService->createCommentInSong($request, $songId);
        return redirect()->route('songs.play', $song->id);
    }

    public function createCommentInPlaylist(Request $request, $playlistId)
    {
        $playlist = $this->playlistService->findById($playlistId);
        $this->commentService->createCommentInPlaylist($request, $playlistId);
        return redirect()->route('playlists.detail', $playlist->id);
    }
}
