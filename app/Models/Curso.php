<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $guarded=[];

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
        $query->when($filters['user'] ?? false, fn($query,$user)=>
            $query->wherehas('users', fn($query)=>
                $query->where('user_id', $user)
            )
        );
    }


    public function professor()
    {
        return $this->belongsto(User::class)->where('is_prof',true);
    }

    public function users()
    {
        return $this->belongstomany(User::class,'curso_users');
    }
}
