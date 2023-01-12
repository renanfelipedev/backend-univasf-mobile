<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Campus, City, State};

class CampusController extends Controller
{
    public function index()
    {
        return view('campuses.index', ['campuses' => Campus::all()]);
    }

    public function create()
    {
        $states = State::all();
        $cities = City::all();
        return view('campuses.create', compact('cities', 'states'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'cnpj' => 'nullable'
        ]);

        Campus::create($data);

        return to_route('campuses.index');
    }

    public function edit(Campus $campus)
    {
        $states = State::all();
        $cities = City::all();

        return view('campuses.edit', compact('campus', 'cities', 'states'));
    }

    public function update(Request $request, Campus $campus)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'cnpj' => 'nullable'
        ]);

        $campus->update($data);

        return to_route('campuses.index');
    }

    public function destroy(Campus $campus)
    {
        $campus->delete();
        return to_route('campuses.index');
    }
}
