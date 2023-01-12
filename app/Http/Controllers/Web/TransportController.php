<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Campus $campus)
    {
        $transports = Transport::all();
        return view('transports.index', compact('campus', 'transports'));
    }

    public function create(Campus $campus)
    {
        return view('transports.create', compact('campus'));
    }

    public function store(Campus $campus, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'busname' => 'required',
            'description' => 'nullable',
            'origin' => 'required',
            'destination' => 'required'
        ]);

        $campus->transports()->create($data);

        return to_route('transports.index', compact('campus'));
    }
}
