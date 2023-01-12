<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use App\Models\Transport;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function index(Campus $campus, Transport $transport)
    {
        return view('stops.index', compact('campus', 'transport'));
    }
}
