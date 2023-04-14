<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Stop;
use App\Models\Transport;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function index(Campus $campus, Transport $transport)
    {
        return view('transports.stops.index', compact('campus', 'transport'));
    }

    public function store(Campus $campus, Transport $transport, Request $request)
    {
        $data = $request->validate([
            'time' => 'required',
            'title' => 'required'
        ]);

        $transport->stops()->create($data);

        return to_route('stops.index', [$campus, $transport]);
    }

    public function destroy(Campus $campus, Transport $transport, Stop $stop)
    {
        $stop->delete();

        return to_route('stops.index', [$campus, $transport]);
    }
}
