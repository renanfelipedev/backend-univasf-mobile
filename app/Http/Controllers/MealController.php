<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(Restaurant $restaurant, Request $request)
    {
        $day = Carbon::parse($request->day);

        $cafes = $restaurant->meals()->where(function ($query) use ($request) {
            $query->where('day', $request->day);
            $query->where('name', 'cafe');
        })->first();

        $almocos = $restaurant->meals()->where(function ($query) use ($request) {
            $query->where('day', $request->day);
            $query->where('name', 'almoco');
        })->first();

        $jantas = $restaurant->meals()->where(function ($query) use ($request) {
            $query->where('day', $request->day);
            $query->where('name', 'janta');
        })->first();

        return view('restaurants.meals.index', compact('restaurant', 'day', 'cafes', 'almocos', 'jantas'));
    }

    public function store(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'day' => 'required',
            'meal' => 'required',
            'food' => 'required'
        ]);

        $meal = $restaurant->meals()->firstOrCreate([
            'day' => $request->day,
            'name' => $request->meal,
        ]);

        $meal->foods()->create([
            'name' => $request->food
        ]);

        session()->flash('meal', $request->meal);

        return redirect()->back();
    }
}
