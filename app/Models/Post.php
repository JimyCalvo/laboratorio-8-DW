<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        //-------------------------\\
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //----------------Relación Polimórfica uno a uno----------------------
    
    public function image()
    {
        return $this->MorphOne(Image::class, 'imageable');
    }
    //----------------Relación Polimórfica uno a muchos----------------------
    
       public function comments()
       {
           return $this->MorphOne(Comentario::class, 'commentable');
       }
    //----------------Relación Polimórifca de Muchos a Muchos ----------------\\
    
        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggable');
        }

}
