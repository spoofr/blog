<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Post table relationship
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
