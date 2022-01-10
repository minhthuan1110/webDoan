<?php

namespace App\Repositories\Payment;

use App\Repositories\RepositoryEloquent;

class PaymentRepositoryEloquent extends RepositoryEloquent implements PaymentRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Payment::class;
    }
}
