<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function select_campus()
    {
        $campuses = Campus::all();
        return view('transports.select-campus', compact('campuses'));
    }

    public function index(Campus $campus)
    {
        $transports = Transport::all();
        return view('transports.index', compact('campus', 'transports'));
    }

    public function create(Campus $campus)
    {
        return view('transports.create', compact('campus'));
    }

    public function edit(Campus $campus, Transport $transport)
    {
        return view('transports.edit', compact('campus', 'transport'));
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

    public function update(Campus $campus, Transport $transport, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'busname' => 'required',
            'description' => 'nullable',
            'origin' => 'required',
            'destination' => 'required'
        ]);

        $transport->update($data);

        return to_route('transports.index', compact('campus'));
    }
}
