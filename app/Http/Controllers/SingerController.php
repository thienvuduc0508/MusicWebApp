<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSingerRequest;
use App\Http\Requests\UpdateSingerRequest;
use App\Services\SingerServiceInterface;
use App\Services\SongServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SingerController extends Controller
{
    protected $singerService;
    protected $songService;

    public function __construct(SingerServiceInterface $singerService,
                                SongServiceInterface $songService)
    {
        $this->singerService = $singerService;
        $this->songService = $songService;
    }
    public function showListSinger(){
        $singers = $this->singerService->getAll();
        return view('singers.showListSinger',compact('singers'));
    }
    public function showDetailSinger($id){
        $singer = $this->singerService->findById($id);
        $data = $singer->songs;
        $arrAudio = [];
        $arrNameSong = [];
        $arrViewSong = [];
        $arrImageSong = [];


        foreach ($data as $song) {
            array_push($arrAudio, $song->audio);
            array_push($arrNameSong, $song->name);
            array_push($arrViewSong, $song->view);
            array_push($arrImageSong, $song->image);
        }

        return view('singers.showDetailSinger', compact('singer','data', 'arrAudio', 'arrNameSong', 'arrViewSong', 'arrImageSong'));
    }

    public function index()
    {
        $userId = Auth::id();
        $singers = $this->singerService->listSingers($userId);
        return view('singers.index', compact('singers'));
    }

    public function create()
    {
        $userId = Auth::id();
        return view('singers.create', compact('userId'));
    }

    public function store(CreateSingerRequest $request)
    {
        $this->singerService->create($request);
        Session::flash('success', 'Tạo mới ca sỹ thành công');
        return redirect()->route('singer.index');
    }

    public function edit($id)
    {
        $singer = $this->singerService->findById($id);
        return view('singers.edit', compact('singer'));
    }

    public function update(UpdateSingerRequest $request, $id)
    {
        $this->singerService->update($request, $id);
        Session::flash('success', 'Cập nhật thông tin thành công');
        return redirect()->route('singer.index');
    }

    public function destroy($id)
    {
        $this->singerService->destroy($id);
        Session::flash('success', 'Xoá ca sỹ thành công');
        return redirect()->route('singer.index');
    }

    public function showAddSingerToSong($songId)
    {
        $song = $this->songService->findById($songId);
        $singers = $this->singerService->getAll();
        return view('singers.addSingerToSong', compact('singers', 'song'));
    }

    public function addSingerToSongs($songId, $singerId)
    {
        $isAdded = $this->singerService->addSinger($songId, $singerId);

        if ($isAdded) {
            Session::flash('success', "Thêm ca sĩ vào bài hát thành công");
        } else {
            Session::flash('error', "Ca sĩ đã được thêm vào bài hát");
        }

        return redirect()->route('songs.play', $songId);
    }
    public function deleteSongInSinger($songId,$singerId){
        $this->singerService->deleteSongInSinger($songId,$singerId);
        Session::flash("success", "Đã xóa bài hát khỏi Ca si");
        return redirect()->route('singer.detailSinger', $singerId);
    }
}
