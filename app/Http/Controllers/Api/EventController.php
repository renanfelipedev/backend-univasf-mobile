<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class EventController extends Controller
{
    public function __invoke(Request $request)
    {
        $day = $request->day;

        if ($day) {
            $events = Event::where(function (Builder $query) use ($day) {
                $query->where('date', $day);
                $query->orWhere('start_at', $day);
                $query->orWhere('end_at', $day);
            })->get();
        } else {
            $events = Event::all();
        }

        return response($events);
    }
}
