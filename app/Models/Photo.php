<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function photogallery(){
        return $this->belongsTo('App\Models\Photogallery');
    }
}
