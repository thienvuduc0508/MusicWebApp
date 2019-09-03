<?php

namespace App\Http\Controllers;

use App\Services\GuestServiceInterface;
use App\Services\SongServiceInterface;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    protected $guestService;

    public function __construct(GuestServiceInterface $guestService)
    {
        $this->guestService = $guestService;
    }

    public function index()
    {
        $songs = $this->guestService->getRandomSongs();
        $newSongs = $this->guestService->getNewSongs();
        $mostListenSongs = $this->guestService->getMostListenSongs();
        return view('welcome', compact('songs', 'newSongs', 'mostListenSongs'));
    }

    public function getAllNewSongs()
    {
        $newSongs = $this->guestService->getAllNewSongs();
        return view('songs.newSong', compact('newSongs'));
    }

    public function getAllMostListenSongs()
    {
        $mostListenSongs = $this->guestService->getAllMostListenSongs();
        return view('songs.mostListenSong', compact('mostListenSongs'));
    }

}
