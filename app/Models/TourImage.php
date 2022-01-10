<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    use HasFactory;

    protected $table = 'tour_images';

    public $imagePath = "tours/";

    protected $fillable = [
        'tour_id',
        'image_path',
    ];

    /**
     * Relationship 1-n (reverse) to Tours.
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
