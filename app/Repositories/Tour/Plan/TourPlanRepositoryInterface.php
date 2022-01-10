<?php

namespace App\Repositories\Tour\Plan;

use App\Repositories\RepositoryInterface;

interface TourPlanRepositoryInterface extends RepositoryInterface
{
    public function getTourName($tourId);
}
