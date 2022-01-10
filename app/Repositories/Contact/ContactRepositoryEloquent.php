<?php

namespace App\Repositories\Contact;

use App\Repositories\RepositoryEloquent;

class ContactRepositoryEloquent extends RepositoryEloquent implements ContactRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Contact::class;
    }
}
