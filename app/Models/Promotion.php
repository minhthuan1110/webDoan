<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'content',
        'start_date',
        'end_date',
        'number',
        'type',
        'amount',
    ];

    /**
     * Relationship 1-n to Bookings
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'payment_id', 'id');
    }

    /**
     * Relationship n-n to Tours
     */
    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'promotion_tour', 'promotion_id', 'tour_id');
    }
}
