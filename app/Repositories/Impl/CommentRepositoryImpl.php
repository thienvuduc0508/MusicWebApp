<?php


namespace App\Repositories\Impl;


use App\Comment;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\Eloquent\EloquentRepository;

class CommentRepositoryImpl extends EloquentRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        $model = Comment::class;
        return $model;
    }
}
