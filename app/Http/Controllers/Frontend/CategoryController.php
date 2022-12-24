<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Car;
use App\Models\Category;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $category_slug = null): View
    {
        $allCategories = Category::all()->where("is_active", true);
        $category = $allCategories->firstWhere('slug', $category_slug);
        $brands = Car::query()->distinct()->get('brand')->pluck('brand');
        $fuels = Car::query()->distinct()->get('fuel')->pluck('fuel');
        $cities = Address::distinct()->get('city')->pluck('city');

        $cars = Car::query()
            ->when($request->cities, fn($query) => $query->whereHas('user.addresses', fn($q) => $q->whereIn('city', $request->cities)))

            ->when(
                $category_slug,
                fn($query) => $query->where('category_id', $category->category_id)
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
                $request->min_km,
                fn($query) => $query->where('km', '>', $request->min_km)
            )
            ->when(
                $request->max_km,
                fn($query) => $query->where('km', '<', $request->max_km)
            )
            ->when(
                $request->min_model,
                fn($query) => $query->where('model', '>', $request->min_model)
            )
            ->when(
                $request->max_model,
                fn($query) => $query->where('model', '<', $request->max_model)
            )
            ->when(
                $request->brand,
                fn($query) => $query->whereIn('brand', $request->brand)
            )
            ->when(
                $request->fuel,
                fn($query) => $query->whereIn('fuel', $request->fuel)
            )
            ->where("is_active", true)
            ->get();

        return view("frontend.home.index", [
            "categories" => $allCategories,
            "cars" => $cars,
            'brands' => $brands,
            'fuels' => $fuels,
            'cities' => $cities,
        ]);

    }
}
