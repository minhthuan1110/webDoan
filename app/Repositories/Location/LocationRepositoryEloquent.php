<?php

namespace App\Repositories\Location;

use App\Models\Area;
use App\Repositories\RepositoryEloquent;

class LocationRepositoryEloquent extends RepositoryEloquent implements LocationRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Location::class;
    }

    public function getAll($columns = ['*'])
    {
        return $this->_model->select($columns)->join('areas', 'locations.area_id', '=', 'areas.id')->get();
    }
}
