<?php

namespace App\Models\SGS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.disciplinas';
    protected $primaryKey = 'cd_disciplina';
    public $incrementing = false;

    public function historico()
    {
        return $this->hasMany(Historico::class, 'cd_disciplina');
    }
}
