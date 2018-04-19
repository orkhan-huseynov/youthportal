<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsRu extends Model
{
    protected $table = 'news_ru';

    protected $fillable = [
        'section_id', 'name', 'active', 'activity_start', 'activity_end', 'video_url', 'video_of_day',
        'actual', 'very_actual', 'important', 'very_important', 'popular', 'photo', 'photo_150', 'tagline', 'text', 'tags',
    ];

    protected $casts = [
        'active' => 'boolean',
        'video_of_day' => 'boolean',
        'actual' => 'boolean',
        'very_actual' => 'boolean',
        'important' => 'boolean',
        'very_important' => 'boolean',
        'popular' => 'boolean',
    ];

    protected $dates = [
        'activity_start',
        'created_at',
        'updated_at',
    ];

    public function section() {
        return $this->belongsTo('App\Models\Section');
    }

}
