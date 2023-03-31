<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();

        return view('restaurants.index', compact('restaurants'));
    }

    public function create()
    {
        return view('restaurants.create');
    }

    public function show(Restaurant $restaurant, Request $request)
    {
        $week = [];
        foreach (range(0, 4) as $day) {
            $referenceDay = $request->day ? Carbon::parse($request->day) : now();
            $date = $referenceDay->startOfWeek()->addDay($day);
            $week[$day] = [
                'hasMeals' => $restaurant->meals()->where('day', $date)->exists(),
                'date' => $date
            ];
        }

        return view('restaurants.show', compact('restaurant', 'week'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'coffe_start_at' => 'nullable',
            'coffe_end_at' => 'nullable',
            'lunch_start_at' => 'nullable',
            'lunch_end_at' => 'nullable',
            'dinner_start_at' => 'nullable',
            'dinner_end_at' => 'nullable'
        ]);

        Restaurant::create($data);

        return to_route('restaurants.index');
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $request->validate([
            'name' => 'required',
            'coffe_start_at' => 'nullable',
            'coffe_end_at' => 'nullable',
            'lunch_start_at' => 'nullable',
            'lunch_end_at' => 'nullable',
            'dinner_start_at' => 'nullable',
            'dinner_end_at' => 'nullable'
        ]);

        $restaurant->update($data);

        return to_route('restaurants.index');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return to_route('restaurants.index');
    }
}
