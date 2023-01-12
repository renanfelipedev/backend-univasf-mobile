<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index()
    {
        $calendars = Calendar::orderBy('created_at')->get();

        return view('calendars.index', compact('calendars'));
    }

    public function create()
    {
        return view('calendars.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
        ]);

        Calendar::create($data);

        return to_route('calendars.index');
    }

    public function edit(Calendar $calendar)
    {
        return view('calendars.edit', compact('calendar'));
    }

    public function update(Request $request, Calendar $calendar)
    {
        $data = $request->validate([
            'title' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
        ]);

        $calendar->update($data);
        $calendar->save();

        return to_route('calendars.index');
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return to_route('calendars.index');
    }
}
