<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'max.videos';
    protected $primaryKey = 'videoid';

    public function categories()
    {
        return $this->belongsToMany(TypeCategory::class, 'max.video_category', 'videoid', 'categoryid');
    }
}
