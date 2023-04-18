<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Meal;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function __invoke(Restaurant $restaurant, Request $request)
    {
        $day = $request->day ? Carbon::parse($request->day) : null;

        $cafes = Food::where(function (Builder $query) use ($restaurant, $day) {
            $query->whereRelation('meal', 'day', $day);
            $query->whereRelation('meal', 'name', 'cafe');
            $query->whereRelation('meal', 'restaurant_id', $restaurant->id);
        })->get();

        $almocos = Food::where(function (Builder $query) use ($day) {
            $query->whereRelation('meal', 'day', $day);
            $query->whereRelation('meal', 'name', 'almoco');
        })->get();

        $jantas = Food::where(function (Builder $query) use ($day) {
            $query->whereRelation('meal', 'day', $day);
            $query->whereRelation('meal', 'name', 'janta');
        })->get();


        return response([
            'day' => $day->format('Y-m-d'),
            'cafe' => $cafes,
            'almoco' => $almocos,
            'janta' => $jantas
        ]);
    }
}
