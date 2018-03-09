<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'avatar', 'about', 'twitter', 'user_id',
    ];

    public function getAvatarAttribute($avatar)
    {
        return asset('/images/avatars/' . $avatar);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
