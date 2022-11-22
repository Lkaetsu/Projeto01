<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function professor()
    {
        return $this->belongsto(Professor::class);
    }

    public function user()
    {
        return $this->hasmany(User::class);
    }
}
