<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

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
        $categories = Category::all()->where("is_active", true);

        return view("frontend.home.detail", ["car" => $car, "categories" => $categories]);
    }

    public function edit(): View
    {
        return view("frontend.home.profil", [
            "user" => auth()->user(),
            'categories' => Category::all(),
            'brands' => Car::distinct()->get('brand')->pluck('brand'),
            'fuels' => Car::distinct()->get('fuel')->pluck('fuel'),
            'cities' => Address::distinct()->get('city')->pluck('city'),
            'address' => auth()->user()->addresses()->firstOrCreate([],[
                'city' => '',
                'district' => '',
                'zipcode' => '',
                'address' => '',
            ])
        ]);
    }

    public function update(Request $request)
    {
        $request->user()->update($request->only('tel_no', 'email'));

        Alert::success('Başarılı', 'kaydedildi');
        return back();
    }

    public function passwordForm(User $user)
    {

        return view("frontend.home.profil", ["user" => $user]);
    }

    public function changePassword(Request $request)
    {
        $password = $request->get("password");
        $password_confirmation = $request->input('password_confirmation');

        if ($password !== $password_confirmation) {
            Alert::error('Hata', 'Parolalar uyuşmuyor.');
            return back();
        }

        $request->user()->update([
            'password' => Hash::make($password)
        ]);

        Alert::success('Başarılı', 'Parolanız değişti');
        return back();
    }


    public function addAddress(Request $request)
    {
        $request->validate([
            'city' => 'required'
        ]);

        $request->user()->addresses()->first()->update([
            'city' => $request->city,
            'district' => $request->district,
            'zipcode' => $request->zipcode,
            'address' => $request->address,
            'is_default' => $request->is_default ? 1 : 0
        ]);

        Alert::success('Başarılı', 'Adres güncellendi');

        return back();
    }

}
