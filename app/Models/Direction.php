<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    // ---- Relación Uno a Uno-----\\

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        //-------------------------\\
}
