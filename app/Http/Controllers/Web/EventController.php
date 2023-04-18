<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $calendars = Calendar::all();
        $events = Event::orderBy('created_at')->get();

        return view('events.index', compact('calendars', 'events'));
    }

    public function create()
    {
        $calendars = Calendar::all();
        return view('events.create', compact('calendars'));
    }

    public function store(Request $request,)
    {
        $data = $request->validate([
            'title' => 'required',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date',
            'description' => 'nullable',
            'date' => 'nullable|date',
            'calendar_id' => 'nullable'
        ]);

        Event::create($data);

        return to_route('events.index');
    }

    public function edit(Event $event)
    {
        $calendars = Calendar::all();
        return view('events.edit', compact('calendars', 'event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date',
            'description' => 'nullable',
            'link' => 'nullable',
            'date' => 'nullable|date',
            'calendar_id' => 'nullable'
        ]);
        dd($data);
        $event->update($data);
        $event->save();

        return to_route('events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return to_route('events.index');
    }
}
