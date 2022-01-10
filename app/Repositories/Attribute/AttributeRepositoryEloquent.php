<?php

namespace App\Repositories\Attribute;

use App\Repositories\RepositoryEloquent;

class AttributeRepositoryEloquent extends RepositoryEloquent implements AttributeRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Attribute::class;
    }
}
