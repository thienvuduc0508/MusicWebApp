<?php


namespace App\Services;

interface GuestServiceInterface extends ServiceInterface
{
    public function getNewSongs();
    public function getMostListenSongs();
    public function getRandomSongs();
    public function getAllNewSongs();
    public function getAllMostListenSongs();

}
