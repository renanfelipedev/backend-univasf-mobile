<?php

namespace App\Models\SISMAPCI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutraFormacao extends Model
{
    protected $connection = 'sismapci';
    protected $table = 'sismapci.outrasformacoes';
    protected $primaryKey = 'id_outraformacao';
    public $incrementing = false;
}
