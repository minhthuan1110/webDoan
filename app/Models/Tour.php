<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory, SoftDeletes;

    public $imagePath = 'tours/';

    protected $fillable = [
        'area_id',
        'location_id',
        'name',
        'code',
        'description',
        'departure_location',
        'departure_time',
        'return_time',
        'destination',
        'itinerary',
        'slot',
        'other_day',
        'adult_price',
        'youth_price',
        'child_price',
        'baby_price',
        'display',
        'image_path',
    ];

    /*
    |-------------------------------------------------------------------
    | Các relationship với bảng khác.
    |-------------------------------------------------------------------
    */
    /**
     * Relationship 1-n (inverse) to Areas
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Relationship n-n to Attributes
     */
    // public function attributes()
    // {
    //     return $this->belongsToMany(Attribute::class, 'attribute_tour', 'tour_id', 'attribute_id');
    // }

    /**
     * Relationship 1-n to Comment
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'tour_id', 'id');
    }

    /**
     * Relationship 1-n (inverse) to Locations
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Relationship n-n (inverse) to Promotions
     */
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }

    /**
     * Relationship n-n to Tag
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_tour', 'tour_id', 'tag_id');
    }

    /**
     * Relationship 1-n to tour_images.
     */
    public function images()
    {
        return $this->hasMany(TourImage::class, 'tour_id', 'id');
    }

    /**
     * Relationship 1-n to TourPlans.
     */
    public function plans()
    {
        return $this->hasMany(TourPlan::class, 'tour_id', 'id');
    }

    /**
     * Relationship 1-n to Values
     */
    public function values()
    {
        return $this->hasMany(Value::class);
    }

    /**
     * Relationship n-n to Vehicles
     */
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'tour_vehicle', 'tour_id', 'vehicle_id');
    }

    /**
     * Relationship 1-n to Comment
     */
    public function votes()
    {
        return $this->hasMany(Vote::class, 'tour_id', 'id');
    }
}
