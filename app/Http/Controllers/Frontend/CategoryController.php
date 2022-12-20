<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $category_id = null): View
    {
        $allCategories = Category::all()->where("is_active", true);
        $brands = Car::query()->distinct()->get('brand')->pluck('brand');

        $cars = Car::query()
            ->when(
                $category_id,
                fn($query) => where('category_id', $category_id)
            )
            ->when(
                $request->min_price,
                fn($query) => $query->where('price', '>', $request->min_price)
            )
            ->when(
                $request->max_price,
                fn($query) => $query->where('price', '<', $request->max_price)
            )
            ->when(
                $request->brand,
                fn($query) => $query->whereIn('brand', $request->brand)
            )
            ->where("is_active", true)
            ->get();

        return view("frontend.home.index", [
            "categories" => $allCategories,
            "cars" => $cars,
            'brands' => $brands
        ]);

    }
}
