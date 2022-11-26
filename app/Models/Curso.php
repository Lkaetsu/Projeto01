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
                //->orwhere($filters['search'] ?? false,fn($query,$search)=>$query
                //        ->from('professors')->wherecolumn('professors.id','professor-id')
                //        ->orwhere('professors.name','like','%'.$search.'%')->dd()
                );
        $query->when($filters['professor'] ?? false, fn($query,$professor)=>
            $query->wherehas('professor', fn($query)=>
                $query->where('name', $professor)
            )
        );
        $query->when($filters['user'] ?? false, fn($query,$user)=>
            $query->wherehas('user', fn($query)=>
                $query->where('user_id', $user)
            )
        );
    }

    public function professor()
    {
        return $this->belongsto(Professor::class);
    }

    public function user()
    {
        return $this->belongstomany(User::class,'curso_users');
    }
}
