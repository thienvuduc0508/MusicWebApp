<?php


namespace App\Services;

interface LikeServiceInterface extends ServiceInterface
{
public function likeSong($songId);
public function dislikeSong($songId);
public function likePlaylist($playlistId);
public function dislikePlaylist($playlistId);
}
