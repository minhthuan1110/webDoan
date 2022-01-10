<?php

namespace App\Repositories\Promotion;

use App\Repositories\RepositoryInterface;

interface PromotionRepositoryInterface extends RepositoryInterface
{
    public function getValuePromotion($promotionId);
}
