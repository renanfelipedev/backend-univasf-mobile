<?php

namespace App\Models\SGS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.pessoas';
    protected $primaryKey = 'ds_cpf';
    protected $keyType = 'string';
    public $incrementing = false;

    public function getDsNomepessoaAttribute()
    {
        return ucwords(strtolower($this->attributes['ds_nomepessoa']));
    }

    public function getDsEmailprincipalAttribute()
    {
        return strtolower($this->attributes['ds_emailprincipal']);
    }
}
