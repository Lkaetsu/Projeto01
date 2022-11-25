<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query,$search)=>
            $query
                ->where('name','like','%'.$search.'%')
                ->orwhere('desc','like','%'.$search.'%')
                ->orwhere('desc_simpl','like','%'.$search.'%')
        );
        $query->when($filters['professor'] ?? false, fn($query,$professor)=>
            $query->wherehas('professor', fn($query)=>
                $query->where('name', $professor)
            )
        );
    }

    public function professor()
    {
        return $this->belongsto(Professor::class);
    }

    public function user()
    {
        return $this->belongstomany(User::class);
    }
}
