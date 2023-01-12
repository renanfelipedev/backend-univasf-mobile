<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        return view('states.index', compact('states'));
    }

    public function create()
    {
        return view('states.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'uf' => 'required'
        ]);

        State::create($data);

        return to_route('states.index');
    }

    public function edit(Request $request, State $state)
    {
        return view('states.edit', compact('state'));
    }

    public function update(Request $request, State $state)
    {
        $data = $request->validate([
            'name' => 'required',
            'uf' => 'required'
        ]);

        $state->update($data);
        $state->save();

        return to_route('states.index');
    }

    public function destroy(State $state)
    {
        $state->delete();

        return to_route('states.index');
    }
}
