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
use phpDocumentor\Reflection\Types\This;

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
        $data = $playlist->songs;

        $arr = [];
        $arrNameSong = [];
        $arrViewSong = [];
        $arrImageSong = [];


        foreach ($data as $song) {
            array_push($arr, $song->audio);
            array_push($arrNameSong, $song->name);
            array_push($arrViewSong, $song->view);
            array_push($arrImageSong, $song->image);
        }

        return view('playlists.detailPlaylist',compact('playlist','data','arr','arrNameSong','arrViewSong','arrImageSong'));
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
        $songId = $this->songService->findById($songId);
        $playlists = $this->playlistService->playlists($userId);
        return view('playlists.addSongToPlayList',compact('playlists','songId'));
    }
    public function addSong($playlistId, $songId){
        $isAdded = $this->playlistService->addSong($playlistId, $songId);

        if ($isAdded) {
            Session::flash('success', "Thêm bài hát vào playlist thành công");
        } else {
            Session::flash('error', "Bài hát đã có trong playlist");
        }

        return redirect()->route('songs.play',$songId);
    }
    public function getSongsInPlaylist($playlistId){
        $playlist = $this->playlistService->findById($playlistId);
        $songs = $playlist->songs;
        return view('playlists.detailPlaylist',compact('songs','playlist'));
    }
    public function deleteSongsInPlaylist($playlistId, $songId){

        $this->playlistService->deleteSongInPlaylist($playlistId,$songId);
        Session::flash("success","Đã xóa bài hát khỏi playlist");
        return redirect()->route('playlists.detail',$playlistId);
    }
    public function getSongsInPlaylistForGuest($playlistId){
        $playlist = $this->playlistService->findById($playlistId);
        $data = $playlist->songs;
        $arr = [];
        $arrNameSong = [];
        $arrViewSong = [];
        $arrImageSong = [];


        foreach ($data as $song) {
            array_push($arr, $song->audio);
            array_push($arrNameSong, $song->name);
            array_push($arrViewSong, $song->view);
            array_push($arrImageSong, $song->image);
        }

        return view('playlists.guestPlaylist',compact('data','arr','arrNameSong','arrViewSong','arrImageSong'));
    }
}

