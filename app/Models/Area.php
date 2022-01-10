<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'domestic',
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship 1-n to Locations.
     */
    public function locations()
    {
        return $this->hasMany(Location::class, 'area_id', 'id');
    }

    /**
     * Relationship 1-n to Tour
     */
    public function tours()
    {
        return $this->hasMany(Tour::class, 'area_id', 'id');
    }
}
