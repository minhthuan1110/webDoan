<?php

namespace App\Repositories\Notification;

use App\Repositories\RepositoryEloquent;

class NotificationRepositoryEloquent extends RepositoryEloquent implements NotificationRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Notification::class;
    }
}
