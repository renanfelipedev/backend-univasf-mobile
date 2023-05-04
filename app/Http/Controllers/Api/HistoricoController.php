<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SGS\Aluno;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function index(Request $request, Aluno $vinculo)
    {
        return response($vinculo);
    }
}
