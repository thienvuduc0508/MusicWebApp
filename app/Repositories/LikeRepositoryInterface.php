<?php


namespace App\Repositories;


interface LikeRepositoryInterface extends RepositoryInterface
{
    public function likeSong($songId);
    public function dislikeSong($songId);
    public function likePlaylist($playlistId);
    public function dislikePlaylist($playlistId);
}
