<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\Eval_;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

        //---------------------------------------------\\
        
    public function level()
    {
        return $this->belongsTo(Level::class);
    
    }
         //---------------------------------------------\\
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
        //---------------------------------------------\\
        
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
        //---------------------------------------------\\
        
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
    ////----------------------TAREA-------------------------------------\\\

    // -----------------------Relación uno a uno---------------------------
    public function direction()
    {
        return $this->hasOne(Direction::class);
    }
      // -----------------------Relación uno a muchos---------------------------
      public function comment()
      {
          return $this->hasMany(Comment::class);
      }
      //--------------------------------------------------------------------\\
      public function evaluation()
      {
          return $this->hasMany(Evaluation::class);
      
      }
    //--------------------------Relación muchos a muchos------------------------------\\

     public function tipo()
     {
         return $this->belongsToMany(Type::class)->withTimestamps();
     }

     //----------------Relación Polimórfica uno a uno----------------------
    
    public function image()
    {
        return $this->MorphOne(Image::class, 'imageable');
    }
    
}
