<?php

namespace App\Models\SISMAPCI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conhecimento extends Model
{
    protected $connection = 'sismapci';
    protected $table = 'sismapci.conhecimentos';
    protected $primaryKey = 'id_conhecimento';
    protected $keyType = 'string';
    public $incrementing = false;
}
