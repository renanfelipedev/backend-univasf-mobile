<?php

namespace App\Models\SISMAPCI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuantidadeAcessos extends Model
{

    protected $connection = 'sismapci';
    protected $table = 'sismapci.acessospesquisador';
    protected $primaryKey = 'id_acessopesquisador';
    public $incrementing = false;
}
