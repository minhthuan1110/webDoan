<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';

    protected $fillable = [
        'about_us',
        'facebook',
        'youtube',
        'instagram',
        'twitter',
        'pinterest',
        'created_at',
        'updated_at',
    ];
}
