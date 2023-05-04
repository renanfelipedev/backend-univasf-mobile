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
    protected $with = ['curso', 'situacao', 'historico.disciplina'];

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class, 'ds_cpf', 'ds_cpf');
    }

    public function curso()
    {
        return $this->hasOneThrough(Curso::class, CursoOfertado::class, 'id_cursoofertado', 'id_curso', 'id_cursoofertado', 'id_curso');
    }

    public function historico()
    {
        return $this->hasMany(Historico::class, 'ds_matricula')->orderByDesc('nm_ano')->orderByDesc('nm_semestre');
    }

    public function situacao()
    {
        return $this->belongsTo(TipoSituacao::class, 'cd_tiposituacaoaluno');
    }
}
