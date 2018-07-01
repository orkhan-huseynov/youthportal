<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_ru', 'name_az', 'published', 'position',
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'published' => 'boolean',
    ];

    public function news_ru() {
        return $this->hasMany('App\Models\NewsRu');
    }

    public function news_az() {
        return $this->hasMany('App\Models\NewsAz');
    }
}
