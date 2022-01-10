<?php

namespace App\Repositories\Admin;

use App\Repositories\RepositoryInterface;

interface AdminRepositoryInterface extends RepositoryInterface
{
    public function block($adminId);
    public function unblock($adminId);
    public function updateProfile($request, $myAdminId);
}
