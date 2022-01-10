<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public $imagePath = 'sliders/';

    protected $fillable = [
        'admin_id',
        'title',
        'content',
        'image_path',
        'display',
    ];

    /**
     * Relationship 1-n (inverse) to Admin
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
