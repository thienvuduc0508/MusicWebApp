<?php


namespace App\Services\Impl;


use App\Repositories\LikeRepositoryInterface;
use App\Services\LikeServiceInterface;

class LikeServiceImpl extends ServiceImpl implements LikeServiceInterface
{
    public function __construct(LikeRepositoryInterface $likeRepository)
    {
        $this->repository = $likeRepository;
    }

    public function likeSong($songId)
    {
        return $this->repository->likeSong($songId);
    }

    public function dislikeSong($songId)
    {
        return $this->repository->dislikeSong($songId);
    }

    public function likePlaylist($playlistId)
    {
        return $this->repository->likePlaylist($playlistId);
    }

    public function dislikePlaylist($playlistId)
    {
        return $this->repository->dislikePlaylist($playlistId);
    }
}
