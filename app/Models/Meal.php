<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = ['day', 'name', 'restaurant_id'];
    protected $with = ['foods'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function getDayAttribute()
    {
        return Carbon::parse($this->attributes['day'])->format('Y-m-d');
    }
}
