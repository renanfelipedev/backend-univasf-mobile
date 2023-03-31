<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->back();
    }
}
