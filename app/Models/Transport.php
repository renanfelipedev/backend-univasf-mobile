<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $with = ['stops'];

    protected $fillable = ['title', 'busname', 'description', 'origin', 'destination', 'campus_id'];

    public function stops()
    {
        return $this->hasMany(Stop::class);
    }
}
