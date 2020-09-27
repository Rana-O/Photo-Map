<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public static $rules = array(
        'access_token' => 'required',
    );

    public function user() {
        return $this->belongsTo('App\User');
    }
}