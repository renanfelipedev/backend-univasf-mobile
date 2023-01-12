<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'coffe_start_at', 'coffe_end_at', 'lunch_start_at', 'lunch_end_at', 'dinner_start_at', 'dinner_end_at'];
}
