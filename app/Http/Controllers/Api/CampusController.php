<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index()
    {
        return Campus::all();
    }

    public function show(Campus $campus)
    {
        return $campus;
    }
}
