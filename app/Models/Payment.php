<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship 1-n to Bookings
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'payment_id', 'id');
    }
}
