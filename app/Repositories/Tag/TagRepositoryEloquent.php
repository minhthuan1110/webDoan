<?php

namespace App\Repositories\Tag;

use App\Repositories\RepositoryEloquent;

class TagRepositoryEloquent extends RepositoryEloquent implements TagRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Tag::class;
    }
}
