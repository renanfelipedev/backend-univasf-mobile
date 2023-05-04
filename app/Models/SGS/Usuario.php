<?php

namespace App\Models\SGS;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.usuarios';
    protected $primaryKey = 'id_usuario';
    public $incrementing = false;
    protected $hidden = ['ds_senha'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'ds_cpf');
    }

    public function vinculos()
    {
        return $this->hasMany(Aluno::class, 'ds_cpf', 'ds_cpf')->orderByDesc('dt_ultimasituacao');
    }
}
