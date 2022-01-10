<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id',
        'tour_id',
        'value',
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship 1-n (inverse) to Attributes.
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * Relationship 1-n (inverse) to Tours
     */
    public function tours()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
