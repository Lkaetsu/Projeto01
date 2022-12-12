<?php

namespace App\Models;

use App\Models\CursoUser;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];
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
    //protected $casts = [
    //    'email_verified_at' => 'datetime',
    //];

    public function setpasswordattribute($password)
    {
        $this->attributes['password']=bcrypt($password);
    }

    public static function hasCurso($curso,$user){
        return $user->cursos()
        ->where('curso_id',$curso->id)
        ->exists();
    }

    public function cursos()
    {
        return $this->belongstomany(Curso::class,'curso_users')->withPivot('nota');
    }

    public function professor_curso(){
        return $this->hasmany(Curso::class)->where('users.is_prof',true);
    }
}
