<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    // Tell laravel to treat $deleted_at column as date
    protected $dates = ['deleted_at'];

    // Variable for mass asignment
    protected $fillable = [
        'title', 'content', 'category_id', 'slug', 'featured_image',
    ];

    // Accessor for $featured_image
    public function getFeaturedImageAttribute($featured_image)
    {
        return asset('/images/posts/' . $featured_image);
    }

    //  Category table relationship
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags() 
    {
        return $this->belongstoMany('App\Tag');
    }
}
