<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index(Campus $campus)
    {
        return $campus->transports;
    }
}
