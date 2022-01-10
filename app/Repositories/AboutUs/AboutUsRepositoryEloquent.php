<?php

namespace App\Repositories\AboutUs;

use App\Repositories\RepositoryEloquent;

class AboutUsRepositoryEloquent extends RepositoryEloquent implements AboutUsRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\About::class;
    }
}
