<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    protected $with = ['transports.stops'];

    protected $fillable = ['name', 'address', 'cnpj', 'state_id', 'city_id'];

    public function transports()
    {
        return $this->hasMany(Transport::class);
    }
}
