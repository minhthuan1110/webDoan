<?php

namespace App\Repositories\Area;

use App\Repositories\RepositoryEloquent;

class AreaRepositoryEloquent extends RepositoryEloquent implements AreaRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Area::class;
    }
}
