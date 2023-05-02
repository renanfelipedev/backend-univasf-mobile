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

    public function docente()
    {
        return $this->belongsToMany(Docente::class, 'sgs.docenteshistoricoalunos', 'id_historicoalunos', 'nm_siape');
    }
}
