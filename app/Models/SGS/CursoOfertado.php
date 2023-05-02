<?php

namespace App\Models\SGS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoOfertado extends Model
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.cursosofertados';
    protected $primaryKey = 'id_cursoofertado';
    public $incrementing = false;
}
