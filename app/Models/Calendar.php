<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start_at', 'end_at'];
    protected $appends = ['formatted_start_at', 'formatted_end_at'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function getFormattedStartAtAttribute() {
        return Carbon::parse($this->attributes['start_at'])->format('d/m/Y');
    }

    public function getFormattedEndAtAttribute() {
        return Carbon::parse($this->attributes['end_at'])->format('d/m/Y');
    }
}
