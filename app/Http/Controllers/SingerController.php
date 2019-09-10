<?php

namespace App\Http\Controllers;

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

    public function index(){
        $userId = Auth::id();
        $singers = $this->singerService->listSingers($userId);
        return view('singers.index', compact('singers'));
    }
    public function create(){
        $userId = Auth::id();
        return view('singers.create', compact('userId'));
    }
    public function store(Request $request){
        $this->singerService->create($request);
        Session::flash('success','Tạo mới ca sỹ thành công');
        return redirect()->route('singer.index');
    }
}
