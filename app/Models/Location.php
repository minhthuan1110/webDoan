<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship 1-n (inverse) to Areas.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Relationship 1-n to Tour
     */
    public function tours()
    {
        return $this->hasMany(Tour::class, 'location_id', 'id');
    }
}
