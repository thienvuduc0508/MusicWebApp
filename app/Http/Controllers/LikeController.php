<?php

namespace App\Http\Controllers;

use App\Like;
use App\Services\LikeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeServiceInterface $likeService)
    {
        $this->likeService = $likeService;
    }
    public function likeSong($songId)
    {
        $this->likeService->likeSong($songId);
        return redirect()->back();
    }
    public function dislikeSong($songId){
        $this->likeService->dislikeSong($songId);
        return redirect()->back();
    }
    public function likePlaylist($PlaylistId)
    {
        $this->likeService->likePlaylist($PlaylistId);
        return redirect()->back();
    }
    public function dislikePlaylist($PlaylistId){
        $this->likeService->dislikePlaylist($PlaylistId);
        return redirect()->back();
    }
}
