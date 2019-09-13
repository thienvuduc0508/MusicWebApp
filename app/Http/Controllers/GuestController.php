<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Services\GuestServiceInterface;
use App\Singer;
use App\Song;
use Illuminate\Http\Request;

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

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $table = $request->table;
        $songs = Song::where('name', 'LIKE', '%' . $keyword . '%')->get();

        $playlists = Playlist::where('name', 'LIKE', '%' . $keyword . '%')->get();

        $singers = Singer::where('name', 'LIKE', '%' . $keyword . '%')->get();

        if (!$keyword) {
            return redirect()->back();
        }
        if ($table == 'song') {
            return view('search.song', compact('songs', 'keyword'));
        } elseif ($table == 'playlist') {
            return view('search.playlist', compact('playlists', 'keyword'));
        } elseif ($table == 'singer') {
            return view('search.singer', compact('singers', 'keyword'));
        }
    }

}
