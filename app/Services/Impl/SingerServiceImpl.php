<?php


namespace App\Services\Impl;


use App\Repositories\SingerRepositoryInterface;
use App\Repositories\SongRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Services\SingerServiceInterface;
use App\Singer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SingerServiceImpl extends ServiceImpl implements SingerServiceInterface
{
    protected $userRepository;
    protected $songRepository;

    public function __construct(SingerRepositoryInterface $singerRepository,
                                UserRepositoryInterface $userRepository,
                                SongRepositoryInterface $songRepository)
    {
        $this->repository = $singerRepository;
        $this->userRepository = $userRepository;
        $this->songRepository = $songRepository;
    }

    public function create($request)
    {
        $singer = new Singer();
        $singer->name = $request->name;
        $singer->user_id = $request->user_id;
        $singer->information = $request->information;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $singer->image = $path;
        }
        $this->repository->create($singer);
    }

    public function listSingers($userId)
    {
        $userId = Auth::id();
        $singers = $this->repository->listSingers($userId);
        return $singers;
    }

    public function update($request, $id)
    {
        $singer = $this->repository->findById($id);
        $singer->name = $request->name;
        $singer->information = $request->information;
        if ($request->hasfile('image')) {
            $currentImage = $singer->image;
            if ($currentImage !== 'images/default.jpg') {
                Storage::delete('/public/' . $currentImage);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $singer->image = $path;
        }
        $this->repository->update($singer);
    }

    public function getSingerIdInSong($songId, $singerId)
    {
        $singerIdInSong = $this->repository->getSingerIdInSong($songId, $singerId);
        return $singerIdInSong;
    }

    public function addSinger($songId, $singerId)
    {
        $singerIdInSong = $this->getSingerIdInSong($songId, $singerId);
        if (!in_array($songId, $singerIdInSong)) {
            $this->repository->addSinger($songId, $singerId);
            return true;
        }
        return false;
    }


}
