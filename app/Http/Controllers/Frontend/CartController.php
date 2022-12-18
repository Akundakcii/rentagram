<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller

{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application

    {
        $cart = $this->getOrCreateCart();
        return view("frontend.cart.index", ["cart" => $cart]);
    }

    /**
     * @return Cart
     */

    private function getOrCreateCart(): Cart
    {
        $user = Auth::user();
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->user_id, 'is_active' => true],
            ['code' => Str::random(0)]

        );
        return $cart;
    }

    public function add(Car $car, int $quantity = 1): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {


        $cart = $this->getOrCreateCart();
        CartDetails::where('cart_id',$cart->cart_id)->delete();


        $details = new CartDetails(
            [
                "cart_id" => $cart->cart_id,
                "car_id" => $car->car_id,
                "quantity" => $quantity,
            ]
        );
        $details->save();
        return redirect("/sepetim");
    }


    public function remove(CartDetails $cartDetails): RedirectResponse
    {
        $cartDetails->delete();
        return redirect("/sepetim");
    }
    public function increment ($id){


        $cart=CartDetails::findOrFail($id);
        $cart->increment('quantity');
        return back();


    }
    public function decrement($id){

        $cart=CartDetails::findOrFail($id);
      if($cart->quantity > 1){

          $cart->decrement('quantity');
      }

        return back();

    }


}
