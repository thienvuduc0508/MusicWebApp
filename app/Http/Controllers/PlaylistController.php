<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlaylistRequest;
use App\Services\PlaylistServiceInterface;
use App\Services\SongServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PlaylistController extends Controller
{
    protected $playlistService;
    protected $songService;

    public function __construct(PlaylistServiceInterface $playlistService,
                                SongServiceInterface $songService)
    {
        $this->playlistService = $playlistService;
        $this->songService = $songService;
    }

    public function index()
    {
        $userId = Auth::id();
        $playlists = $this->playlistService->playlists($userId);
        return view('playlists.showPlaylists', compact('playlists'));

    }


    public function create()
    {
        $userId = Auth::id();
        return view('playlists.createPlaylist', compact('userId'));
    }


    public function store(CreatePlaylistRequest $request)
    {
        $this->playlistService->create($request);
        Session::flash('success', 'tạo mới playlist thành công');
        return redirect()->route('playlists.showPlaylists');
    }


    public function show($id)
    {
        $playlist = $this->playlistService->findById($id);
        return view('playlists.detail', compact('playlist'));
    }


    public function edit($playlistId)
    {
        $playlist = $this->playlistService->findById($playlistId);
        return view('playlists.update',compact('playlist'));
    }


    public function update(Request $request, $playlistId)
    {
        $this->playlistService->update($request, $playlistId);
        Session::flash('message', "Cập nhật thành công playlist");
        return redirect()->route('playlists.showPlaylists');
    }


    public function destroy($id)
    {

    }
}
