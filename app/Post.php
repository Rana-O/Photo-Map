<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'lat', 'lng', 'caption', 'photo'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
