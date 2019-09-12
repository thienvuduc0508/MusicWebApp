<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Playlist;
use App\Services\SingerServiceInterface;
use App\Services\SongServiceInterface;
use App\Song;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SongController extends Controller
{
    protected $songService;
    protected $singerService;

    public function __construct(SongServiceInterface $songService,
                                SingerServiceInterface $singerService)
    {
        $this->songService = $songService;
        $this->singerService = $singerService;
    }

    public function index()
    {
        $userId = Auth::id();
        $songs = $this->songService->listSong($userId);
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        $userId = Auth::id();
        $singers = $this->singerService->listSingers($userId);
        return view('songs.create', compact('userId', 'singers'));
    }

    public function store(CreateSongRequest $request)
    {

        $this->songService->create($request);
        Session::flash('success', 'Tạo mới bài hát thành công');
        return redirect()->route('songs.index');
    }

    public function showSong($id)
    {
        $songKey = 'post_' . $id;
        if (!Session::has($songKey)) {
            Song::where('id', $id)->increment('view');
            Session::put($songKey, 1);
        }
        $checkstatus = $this->checkStatus($id);
        $song = $this->songService->findById($id);
        return view('songs.playSong', compact('song', 'checkstatus'));
    }

    public function delete($id)
    {
        $this->songService->destroy($id);
        Session::flash('success', 'Xóa bài hát thành công');
        return redirect()->route('songs.index');
    }

    public function edit($id)
    {
        $song = $this->songService->findById($id);
        return view("songs.edit", compact('song'));
    }

    public function update(UpdateSongRequest $request, $id)
    {
        $this->songService->update($request, $id);
        Session::flash('success', 'Cập nhật thông tin thành công');
        return redirect()->route('songs.index');
    }

    public function checkStatus($songId)
    {
        $songs = $this->songService->findById($songId);
        $likesInSong = $songs->likes;
        if (count($likesInSong) == 0) {
            return false;
        } else {
            foreach ($likesInSong as $like) {
                if ($like->user->id === Auth::id()){
                    return true;
                }
            }
            return false;
        }
    }
}
