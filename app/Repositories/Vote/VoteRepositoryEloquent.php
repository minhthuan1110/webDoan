<?php

namespace App\Repositories\Vote;

use App\Repositories\RepositoryEloquent;

class VoteRepositoryEloquent extends RepositoryEloquent implements VoteRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Vote::class;
    }
}
