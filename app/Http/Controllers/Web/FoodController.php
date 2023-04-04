<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
