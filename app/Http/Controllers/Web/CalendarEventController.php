<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\CalendarEvent;
use Illuminate\Http\Request;

class CalendarEventController extends Controller
{
    public function index()
    {
        $calendars = Calendar::all();
        $events = CalendarEvent::orderBy('created_at')->get();

        return view('calendar-events.index', compact('calendars', 'events'));
    }

    public function store(Request $request,)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'date' => 'required|date',
            'calendar_id' => 'nullable'
        ]);

        CalendarEvent::create($data);

        return to_route('calendar-events.index');
    }

    public function destroy(CalendarEvent $calendar_event)
    {
        $calendar_event->delete();
        return to_route('calendar-events.index');
    }
}
