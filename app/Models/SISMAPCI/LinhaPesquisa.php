<?php

namespace App\Models\SISMAPCI;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinhaPesquisa extends Model
{
    protected $connection = 'sismapci';
    protected $table = 'sismapci.linhaspesquisa';
    protected $primaryKey = 'id_linhapesquisa';
    public $incrementing = false;
}
