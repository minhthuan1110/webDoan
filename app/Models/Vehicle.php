<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship n-n (inverse) to Tours
     */
    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }
}
