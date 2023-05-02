<?php

namespace App\Models\SGS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSituacao extends Model
{
    use HasFactory;

    protected $connection = 'sgs';
    protected $table = 'sgs.tiposituacaoaluno';
    protected $primaryKey = 'cd_tiposituacaoaluno';
    public $incrementing = false;
}
