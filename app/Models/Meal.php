<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = ['day', 'name', 'restaurant_id'];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
