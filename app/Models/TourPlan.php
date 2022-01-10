<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPlan extends Model
{
    use HasFactory;

    protected $table = 'tour_plans';

    protected $fillable = [
        'tour_id',
        'day',
        'content',
        'note',
    ];

    /**
     * Relationship 1-n (reverse) to Tours.
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
