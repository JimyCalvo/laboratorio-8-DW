<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

//----------------Relación Polimórifca de Muchos a Muchos ----------------\\
//-----Videos
    public function videos()
    {
        return $this->morphedByMany(Video::class,'taggable');
    }
//-----Post
    public function posts()
    {
        return $this->morphedByMany(Post::class,'taggable');
    }
}
