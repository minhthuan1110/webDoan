<?php

namespace App\Models;


use Illuminate\Auth\Passwords\CanResetPassword as PasswordsCanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\Access\Authorizable;

class Admin extends Authenticatable implements MustVerifyEmail, CanResetPassword, Authorizable
{
    use PasswordsCanResetPassword, HasFactory, HasRoles;

    public $imagePath = 'admins/';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'avatar_image_path',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    |-------------------------------------------------------------------
    | Relationship.
    |-------------------------------------------------------------------
    */
    /**
     * Relationship 1-n to Articles.
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'admin_id', 'id');
    }

    /**
     * Relationship 1-n to Sliders.
     */
    public function sliders()
    {
        return $this->hasMany(Slider::class, 'admin_id', 'id');
    }
}
