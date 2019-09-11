<?php


namespace App\Services\Impl;


use App\Exceptions\NotFoundException;
use App\Repositories\Impl\SongRepositoryImpl;
use App\Repositories\SongRepositoryInterface;
use App\Services\SongServiceInterface;
use App\Song;
use Illuminate\Support\Facades\Storage;

class SongServiceImpl extends ServiceImpl implements SongServiceInterface
{
    public function __construct(SongRepositoryInterface $songRepository)
    {
        $this->repository = $songRepository;
    }

    public function listSong($userId)
    {
        $songs = $this->repository->listSong($userId);
        return $songs;
    }

    public function create($request)
    {
        $song = new Song();
        $song->name = $request->name;
        $song->user_id = $request->user_id;
        $song->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $song->image = $path;
        }
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $path = $audio->store('audios', 'public');
            $song->audio = $path;
        }
        $this->repository->create($song);
    }

    public function update($request, $id)
    {
        $song = $this->repository->findById($id);
        if ($song) {
            $song->name = $request->name;
            $song->description = $request->description;
            if ($request->hasFile('image')) {
                $oldImageSong = $song->image;
                if ($oldImageSong !== 'images/logomusic.jpg') {
                    Storage::delete('/public/' . $oldImageSong);
                }
                $image = $request->file('image');
                $path = $image->store('images', 'public');
                $song->image = $path;

            }
            if ($request->hasFile('audio')) {
                $oldSong = $song->audio;
                Storage::delete('/public/' . $oldSong);
                $audio = $request->file('audio');
                $path = $audio->store('audios', 'public');
                $song->audio = $path;
            }
            $this->repository->update($song);
        } else {
            throw new NotFoundException();
        }
    }

    public function findByName($keyword)
    {
        return $this->repository->searchSongByName($keyword);
    }

    public function getSongsInPlaylist($playlist)
    {
        return $this->repository->getSongsInPlaylist($playlist);
    }

}
