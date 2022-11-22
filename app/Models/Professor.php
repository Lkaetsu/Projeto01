<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    public function curso()
    {
        return $this->hasMany(Curso::class);
    }
    public function user()
    {
        return $this->belongto(User::class);
    }
}
