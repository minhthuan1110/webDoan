<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Passwords\CanResetPassword as PasswordsCanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as ContractAuthenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword, ContractAuthenticatable
{
    use PasswordsCanResetPassword;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public $imagePath = 'users/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facebook_id',
        'google_id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'address',
        'avatar_image_path',
        'remember_token',
        'current_team_id',
        'profile_photo_path',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_path',
    ];

    /*
    |-------------------------------------------------------------------
    | Xác định các mối quan hệ với bảng khác.
    |-------------------------------------------------------------------
    */
    /**
     * Relationship 1-n to Booking.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id', 'id');
    }

    /**
     * Relationship 1-n to Comments.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    /**
     * Relationship 1-n to Notifications.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'id');
    }

    /**
     * Relationship 1-n to Votes.
     */
    public function votes()
    {
        return $this->hasMany(Vote::class, 'user_id', 'id');
    }

    /*
    |-------------------------------------------------------------------
    | Các hàm chức năng khác.
    |-------------------------------------------------------------------
    */
    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $url = 'https://vietour.biz/reset-password?token=' . $token;

        $this->notify(new ResetPasswordNotification($url));
    }
}
