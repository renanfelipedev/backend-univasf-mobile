<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function __invoke()
    {
        return response(Calendar::all());
    }
}
