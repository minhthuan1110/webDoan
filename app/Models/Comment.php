<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Relationship 1-n (inverse) to Tour
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    /**
     * Relationship 1-n (inverse) to user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
