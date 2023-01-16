<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Campus $campus)
    {
        return $campus->transports;
    }

    public function show(Campus $campus, Transport $transport)
    {
        return $transport->stops;
    }
}
