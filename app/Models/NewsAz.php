<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsAz extends Model
{
    protected $table = 'news_az';

    protected $fillable = [
        'section_id', 'name', 'active', 'activity_start', 'activity_end', 'video_url', 'video_of_day',
        'actual', 'very_actual', 'important', 'very_important', 'photo', 'photo_150', 'tagline', 'text', 'tags',
    ];

    protected $casts = [
        'active' => 'boolean',
        'video_of_day' => 'boolean',
        'actual' => 'boolean',
        'very_actual' => 'boolean',
        'important' => 'boolean',
        'very_important' => 'boolean',
    ];

    public function section() {
        return $this->belongsTo('App\Models\Section');
    }

}
