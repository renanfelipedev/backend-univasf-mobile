<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'description', 'link', 'calendar_id'];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->format('d/m/Y');
    }
}
