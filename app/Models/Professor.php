<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function curso()
    {
        return $this->hasmany(Curso::class);
    }
    public function user()
    {
        return $this->belongsto(User::class);
    }
}
