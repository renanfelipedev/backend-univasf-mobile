<?php

namespace App\Models\SISMAPCI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $connection = 'sismapci';
    protected $table = 'sismapci.pessoas';
    protected $primaryKey = 'ds_cpf';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $with = ['laboratorios', 'formacoes', 'linhaspesquisa', 'conhecimentos', 'outrasformacoes'];

    protected $withCount = ['acessos'];

    public function formacoes()
    {
        return $this->hasMany(Formacao::class, 'ds_cpf', 'ds_cpf')->orderBy('nm_ano_fim');
    }

    public function laboratorios()
    {
        return $this->hasMany(Laboratorio::class, 'ds_cpf', 'ds_cpf');
    }

    public function linhasPesquisa()
    {
        return $this->hasMany(LinhaPesquisa::class, 'ds_cpf', 'ds_cpf');
    }

    public function conhecimentos()
    {
        return $this->hasMany(Conhecimento::class, 'ds_cpf', 'ds_cpf');
    }

    public function outrasFormacoes()
    {
        return $this->hasMany(OutraFormacao::class, 'ds_cpf', 'ds_cpf');
    }

    public function acessos()
    {
        return $this->hasMany(QuantidadeAcessos::class, 'ds_cpf', 'ds_cpf');
    }
}
