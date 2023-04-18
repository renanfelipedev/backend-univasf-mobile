<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CalendarEvent;
use Illuminate\Http\Request;

class CalendarEventController extends Controller
{
    public function __invoke(Request $request)
    {
        $events = $request->day ?  CalendarEvent::where('date', $request->day)->get() : CalendarEvent::all();

        return response($events);
    }
}
