<?php

namespace App\Repositories\Vehicle;

use App\Repositories\RepositoryEloquent;

class VehicleRepositoryEloquent extends RepositoryEloquent implements VehicleRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Vehicle::class;
    }
}
