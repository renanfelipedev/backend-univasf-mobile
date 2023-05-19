<?php

namespace App\Models\SISMAPCI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $connection = 'sismapci';
    protected $table = 'sismapci.laboratorios';
    protected $primaryKey = 'id_laboratorio';
    public $incrementing = false;
}
