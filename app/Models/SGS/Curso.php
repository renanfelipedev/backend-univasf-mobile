<?php

namespace App\Models\SGS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.cursos';
    protected $primaryKey = 'id_curso';
    public $incrementing = false;

    public function getDsNomecursoAttribute()
    {
        return ucwords(mb_strtolower($this->attributes['ds_nomecurso'], 'UTF-8'));
    }
}
