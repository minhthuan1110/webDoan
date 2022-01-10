<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'promotion_id',
        'code',
        'full_name',
        'phone',
        'email',
        'address',
        'note',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Relationship 1-n (inverse) to Payment
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * Relationship 1-n (inverse) to Promotion
     */
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    /**
     * Relationship 1-n (inverse) to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
