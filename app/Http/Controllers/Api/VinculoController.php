<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VinculoController extends Controller
{
    public function index(Request $request)
    {
        return response($request->user()->vinculos);
    }
}
