<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{

    public function index(): View
    {
        $cars = Car::all()->where("is_active", true);
        $categories = Category::all()->where("is_active", true);

        return view("frontend.home.index", ["categories" => $categories, "cars" => $cars]);
    }
    public function detail(Car $car): View
    {
      return view("frontend.home.detail",["car" => $car ]);
    }

}

