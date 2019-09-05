<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;
use App\Playlist;
use App\Services\PlaylistServiceInterface;
use App\Services\SongServiceInterface;
use App\Song;
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


    public function showDetailPlaylist($id)
    {
        $playlist = $this->playlistService->findById($id);
        $songs = $this->songService->getSongsInPlaylist($playlist);
        return view('playlists.detailPlaylist', compact('playlist','songs'));
      }


    public function edit($playlistId)
    {
        $playlist = $this->playlistService->findById($playlistId);
        return view('playlists.updatePlaylist',compact('playlist'));
    }


    public function update(UpdatePlaylistRequest $request, $playlistId)
    {
        $this->playlistService->update($request, $playlistId);
        Session::flash('success', "Cập nhật thành công playlist");
        return redirect()->route('playlists.showPlaylists');
    }


    public function destroy($id)
    {
        $this->playlistService->destroy($id);
        Session::flash('success', 'Xóa playlist thành công');
        return redirect()->route('playlists.showPlaylists');
    }
    public function getAllNewPlaylists()
    {
        $newPlaylists = $this->playlistService->getAllNewPlaylists();
        return view('playlists.newPlaylists', compact('newPlaylists'));
    }

    public function showAddSongToPlaylist($songId){

        $userId = Auth::id();
        $songId = Song::findOrFail($songId)->id;
        $playlists = $this->playlistService->playlists($userId);
        return view('playlists.addSongToPlayList',compact('playlists','songId'));
    }
    public function addSong($playlistId, $songId){
        $this->playlistService->addSong($playlistId, $songId);
        Session::flash('success', "Thêm mới thành công playlist");
        return redirect()->route('playlists.getSong',$playlistId);
    }
    public function getSongsInPlaylist($playlistId){
        $playlist = $this->playlistService->findById($playlistId);
        $songs = $playlist->songs;
        return view('playlists.detailPlaylist',compact('songs'));
    }

}

