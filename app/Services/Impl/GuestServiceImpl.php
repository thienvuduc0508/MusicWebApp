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
}
