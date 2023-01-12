<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'description', 'start_at', 'end_at', 'calendar_id'];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->format('d/m/Y');
    }

}
