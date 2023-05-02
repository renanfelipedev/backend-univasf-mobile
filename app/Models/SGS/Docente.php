<?php

namespace App\Models\SGS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.docentes';
    protected $primaryKey = 'nm_siape';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $with = ['pessoa'];


    public function pessoa()
    {
        return $this->hasOne(Pessoa::class, 'ds_cpf', 'ds_cpf');
    }

    public function disciplinas()
    {
        return $this
            ->belongsToMany(Disciplina::class, 'sgs.historicoalunos', 'ds_matricula', 'cd_disciplina');
    }
}
