<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'description', 'link', 'start_at', 'end_at', 'calendar_id'];
    protected $appends = ['formatted_start_at', 'formatted_end_at', 'formatted_date'];

    public function getFormattedStartAtAttribute()
    {
        return Carbon::parse($this->attributes['start_at'])->format('d/m/Y');
    }

    public function getFormattedEndAtAttribute()
    {
        return Carbon::parse($this->attributes['end_at'])->format('d/m/Y');
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->format('d/m/Y');
    }
}
