<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarImageRequest;
use App\Models\Car;
use App\Models\CarImage;
use http\Env\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CarImageController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/cars/{}/images";
        $this->filleRepo = "public/cars";
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Car $car): View
    {
        return view("backend.images.index", ["car" => $car]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Car $car): View
    {
        return view("backend.images.insert_form", ["car" => $car]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Car $car
     * @param CarImageRequest $request
     * @return RedirectResponse
     */
    public function store(CarImageRequest $request, Car $car): RedirectResponse
    {


        $carImage = new CarImage();
        $data = $this->prepare($request, $carImage->getFillable());
        $carImage->fill($data);
        $carImage->save();

        $this->editReturnUrl($car->car_id);

        return Redirect::to($this->returnUrl);
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "/cars/$id/images";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @param CarImage $image
     * @return View
     */
    public function edit(Car $car, CarImage $image): View
    {
        return view("backend.images.update_form", ["car" => $car, "image" => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarImageRequest $request
     * @param Car $car
     * @param CarImage $image
     * @return RedirectResponse
     */
    public function update(CarImageRequest $request, Car $car, CarImage $image): RedirectResponse
    {

        $data = $this->prepare($request, $image->getFillable());

        $image->fill($data);
        $image->save();

        $this->editReturnUrl($car->car_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @param CarImage $image
     * @return JsonResponse
     */
    public function destroy(Car $car, CarImage $image)
    {

         $filepath = $this->filleRepo."/" . $image->image_url;



        if (Storage::disk("local")->exists($filepath)) {
            Storage::disk("local")->delete($filepath);
        }
        $image->delete();
        Alert::success('Başarıyla', 'SİLİNDİ');

        return back();

    }
}





