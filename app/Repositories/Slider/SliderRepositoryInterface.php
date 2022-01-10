<?php

namespace App\Repositories\Slider;

use App\Repositories\RepositoryInterface;

interface SliderRepositoryInterface extends RepositoryInterface
{
    public function storeSlider($request, $image);
    public function updateSlider($sliderId, $request, $image);
}
