<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    public $imagePath = 'articles/';
    // public $thumbnailPath = 'articles/thumbnail/';
    public $imagePathInEditor = '/images/editor/';

    protected $fillable = [
        'admin_id',
        'title',
        'image_path',
        'content',
        'display',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // public function __construct($imagePath)
    // {
    //     $this->imagePath = $imagePath;
    // }
    /**
     * Relationship 1-n (inverse) to Admin
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
