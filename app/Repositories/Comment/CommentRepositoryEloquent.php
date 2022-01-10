<?php

namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\RepositoryEloquent;

class CommentRepositoryEloquent extends RepositoryEloquent implements CommentRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Comment::class;
    }
}
