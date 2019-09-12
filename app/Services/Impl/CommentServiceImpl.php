<?php


namespace App\Services\Impl;


use App\Comment;
use App\Repositories\CommentRepositoryInterface;
use App\Services\CommentServiceInterface;

class CommentServiceImpl extends ServiceImpl implements CommentServiceInterface
{
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->repository = $commentRepository;
    }

    public function createCommentInSong($request, $songId)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->song_id = $songId;
        $comment->user()->associate($request->user());
        $this->repository->create($comment);
    }
    public function createCommentInPlaylist($request,$playlistId)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->playlist_id = $playlistId;
        $comment->user()->associate($request->user());
        $this->repository->create($comment);

    }
    public function createCommentInSinger($request,$singerId)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->singer_id = $singerId;
        $comment->user()->associate($request->user());
        $this->repository->create($comment);
    }
}
