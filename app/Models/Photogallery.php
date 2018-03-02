<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photogallery extends Model
{
    protected $dates = [
        'activity_start',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function photo(){
        return $this->hasMany('App\Models\Photo');
    }
}
