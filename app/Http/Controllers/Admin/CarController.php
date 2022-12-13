<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/cars";
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        if($request->user()->is_admin===10){

            $cars = Car::all();
        }
        else {
            $cars = $request->user()->cars;
        }



        return view("backend.cars.index", ["cars" => $cars]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {

        $categories = Category::all();
        return view("backend.cars.insert_form",["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarRequest $request
     * @return RedirectResponse
     */
    public function store(CarRequest $request): RedirectResponse
    {
        $name = $request->get("name");
        $category_id = $request->get("category_id");

        $km =$request->get("km");
        $model =$request->get("model");
        $brand=$request->get("brand");
        $price =$request->get("price");
        $fuel =$request->get("fuel");
        $engine =$request->get("engine");
        $slug =$request->get("slug");
        $description =$request->get("description");
        $is_active = $request->get("is_active", default: 0);

        $car = new Car();
        $car->user_id=$request->user()->user_id;
        $car->name =$name;
        $car->category_id =$category_id;
        $car->km =$km;
        $car->model =$model;
        $car->brand =$brand;
        $car->price =$price;
        $car->fuel =$fuel;
        $car->engine =$engine;
        $car->description =$description;
        $car->slug =$slug;
        $car->is_active = $is_active;
        $car->save();

        /* $car = new Car();
        $data = $this->prepare($request, $car->getFillable());
        $car->fill($data);
        $car->save();*/

        return Redirect::to($this->returnUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return View
     */
    public function edit(Car $car): View
    {
        $categories= Category::all();
        return view("backend.cars.update_form", ["car" => $car,"categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarRequest $request
     * @param Car $car
     * @return RedirectResponse
     */
    public function update(CarRequest $request, Car $car): RedirectResponse
    {

        /*$name = $request->get("name");
        $category_id = $request->get("category_id");
        $km =$request->get("km");
        $model =$request->get("model");
        $brand=$request->get("brand");
        $price =$request->get("price");
        $fuel =$request->get("fuel");
        $engine =$request->get("engine");
        $slug =$request->get("slug");
        $description =$request->get("description");
        $is_active = $request->get("is_active", default: 0);


        $car->name =$name;
        $car->category_id =$category_id;
        $car->km =$km;
        $car->model =$model;
        $car->brand =$brand;
        $car->price =$price;
        $car->fuel =$fuel;
        $car->engine =$engine;
        $car->description =$description;
        $car->slug =$slug;
        $car->is_active = $is_active;

        $car->save();*/


        $data = $this->prepare( $request, $car->getFillable());
        $car->fill($data);
        $car->save();

        return Redirect::to($this->returnUrl);
    }



    /**
     * Display the specified resource.
     *
     * @param int $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {

        $car->delete();


       // return response()->json(["message" => "Done", "id" => $car->car_id]);
        return Redirect::to($this->returnUrl);

    }

}
