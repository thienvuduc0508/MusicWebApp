<?php


namespace App\Services;


interface CommentServiceInterface extends ServiceInterface
{
public function createCommentInSong($request, $songId);
public function createCommentInPlaylist($request,$playlistId);
public function createCommentInSinger($request,$singerId);
}
