<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'coffe_start_at', 'coffe_end_at', 'lunch_start_at', 'lunch_end_at', 'dinner_start_at', 'dinner_end_at'];
    protected $appends = ['isOpen'];

    public function getIsOpenAttribute()
    {
        return (now()->format('H:i') >= $this->coffe_start_at && now()->format('H:i') < $this->coffe_end_at) ||
            (now()->format('H:i') >= $this->lunch_start_at && now()->format('H:i') < $this->lunch_end_at) ||
            (now()->format('H:i') >= $this->dinner_start_at && now()->format('H:i') < $this->dinner_end_at);
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
