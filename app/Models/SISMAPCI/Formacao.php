<?php

namespace App\Models\SISMAPCI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    protected $connection = 'sismapci';
    protected $table = 'sismapci.formacoeslattes';
    protected $primaryKey = 'id_formacaolattes';
    public $incrementing = false;
}
