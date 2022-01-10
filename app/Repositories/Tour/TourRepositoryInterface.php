<?php

namespace App\Repositories\Tour;

use App\Repositories\RepositoryInterface;

interface TourRepositoryInterface extends RepositoryInterface
{
    public function getPlan($tourId);
    public function getImageTour($tourId);
}
