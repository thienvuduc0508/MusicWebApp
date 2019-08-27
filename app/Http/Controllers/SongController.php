<?php

namespace App\Http\Controllers;

use App\Services\SongServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
