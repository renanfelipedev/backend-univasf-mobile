<?php

namespace App\Models\SGS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.historicoalunos';
    protected $primaryKey = 'id_historicoalunos';
    public $incrementing = false;
    protected $with = ['disciplina'];
    protected $appends = ['situacao_disciplina'];

    public function getSituacaodisciplinaAttribute()
    {
        return match ($this->attributes['ds_situacaodisciplina']) {
            'A' => 'Aprovado',
            'R' => 'Reprovado',
            'D' => 'Desistência',
            'T' => 'Trancada',
            default => null
        };
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'cd_disciplina');
    }

    public function docente()
    {
        return $this->belongsToMany(Docente::class, 'sgs.docenteshistoricoalunos', 'id_historicoalunos', 'nm_siape');
    }
}
