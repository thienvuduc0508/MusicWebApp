<?php

namespace App\Http\Controllers;

use App\Services\SongServiceInterface;
use App\Song;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SongController extends Controller
{
    protected $songService;
    public function __construct(SongServiceInterface $songService)
    {
        $this->songService = $songService;
    }
    public function index(){
        $userId = Auth::id();
        $songs = $this->songService->listSong($userId);
        return view('songs.index', compact('songs'));
    }
    public function create(){
        $userId = Auth::id();
        return view('songs.create', compact('userId'));
    }
    public function store(Request $request){

        $this->songService->create($request);
//        Session::flash('success','Tạo mới bài hát thành công');
        return redirect()->route('songs.index');
    }
    public function showSong($id){
       $song = $this->songService->findById($id);
        return view('songs.playSong',compact('song'));
    }
    public function delete($id){
        $this->songService->destroy($id);
        return redirect()->route('songs.index');
    }
    public function edit($id){
        $song = $this->songService->findById($id);
        return view("songs.edit",compact('song'));
    }
    public function update(Request $request,$id){
        $this->songService->update($request,$id);
//        Session::flash('success', 'Cập nhật thông tin thành công');
        return redirect()->route('songs.index');
    }

}
