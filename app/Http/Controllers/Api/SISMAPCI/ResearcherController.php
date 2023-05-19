<?php

namespace App\Http\Controllers\Api\SISMAPCI;

use App\Http\Controllers\Controller;
use App\Models\SISMAPCI\Pessoa;
use Illuminate\Http\Request;

class ResearcherController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::orderByDesc('acessos_count')->take(10)->get();

        return response($pessoas);
    }

    public function show($pessoa)
    {
        $pessoa = Pessoa::where('ds_cpf', $pessoa)->first();

        return response($pessoa);
    }
}
