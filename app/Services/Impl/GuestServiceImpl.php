<?php


namespace App\Services\Impl;


use App\Repositories\GuestRepositoryInterface;
use App\Services\GuestServiceInterface;

class GuestServiceImpl extends ServiceImpl implements GuestServiceInterface
{
    public function __construct(GuestRepositoryInterface $guestRepository)
    {
        $this->repository = $guestRepository;
    }

    public function getNewSongs()
    {
        return $this->repository->getNewSongs();
    }

    public function getMostListenSongs()
    {
        return $this->repository->getMostListenSongs();
    }

    public function getRandomSongs()
    {
        return $this->repository->getRandomSongs();
    }

    public function getAllNewSongs()
    {
        return $this->repository->getAllNewSongs();
    }

    public function getAllMostListenSongs()
    {
        return $this->repository->getAllMostListenSongs();
    }
}
