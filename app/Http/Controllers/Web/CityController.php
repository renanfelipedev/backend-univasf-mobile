<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('state_id')->get();

        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        $states = State::all();
        return view('cities.create', compact('states'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'state_id' => 'required'
        ]);

        City::create($data);

        return to_route('cities.index');
    }

    public function edit(Request $request, City $city)
    {
        $states = State::all();
        return view('cities.edit', compact('city', 'states'));
    }

    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'name' => 'required',
            'state_id' => 'required'
        ]);

        $city->update($data);
        $city->save();

        return to_route('cities.index');

    }

    public function destroy(City $city)
    {
        $city->delete();
        return to_route('cities.index');
    }
}
