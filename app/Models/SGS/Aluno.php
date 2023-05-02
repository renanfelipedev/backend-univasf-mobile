<?php

namespace App\Models\SGS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.alunos';
    protected $primaryKey = 'ds_matricula';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $with = ['pessoa'];

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class, 'ds_cpf', 'ds_cpf');
    }

    public function curso()
    {
        return $this->hasOneThrough(Curso::class, CursoOfertado::class, 'id_cursoofertado', 'id_curso', 'id_cursoofertado', 'id_curso');
    }

    public function disciplinas()
    {
        return $this
            ->belongsToMany(Disciplina::class, 'sgs.historicoalunos', 'ds_matricula', 'cd_disciplina')
            ->as('historico')
            ->orderByPivot('nm_ano')
            ->orderByPivot('nm_semestre')
            ->withPivot(['id_historicoalunos', 'nm_ano', 'nm_semestre', 'nm_nota', 'ds_conceito', 'ds_situacaodisciplina']);
    }

    public function situacao()
    {
        return $this->belongsTo(TipoSituacao::class, 'cd_tiposituacaoaluno');
    }
}
