<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [\App\Http\Controllers\Frontend\CategoryController::class, 'index']);
Route::get('/ilan/{car:slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'detail']);
Route::get('/kategori/{category_slug}', [\App\Http\Controllers\Frontend\CategoryController::class, 'index']);

Route::get("/giris", [\App\Http\Controllers\Frontend\AuthController::class, 'SignInForm']);
Route::post("/giris", [\App\Http\Controllers\Frontend\AuthController::class, 'signIn']);


Route::get("/uye-ol", [\App\Http\Controllers\Frontend\AuthController::class, 'SignUpForm']);
Route::post("/uye-ol", [\App\Http\Controllers\Frontend\AuthController::class, 'signUp']);

Route::get("/cikis", [\App\Http\Controllers\Frontend\AuthController::class, 'logOut']);


Route::group(["middleware" => "auth"], function () {

    Route::get("/sepetim", [\App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get("/sepetim/ekle/{car}", [\App\Http\Controllers\Frontend\CartController::class, 'add']);
    Route::get("/sepetim/sil/{cartDetails}", [\App\Http\Controllers\Frontend\CartController::class, 'remove']);
    Route::get("/satin-al", [\App\Http\Controllers\Frontend\CheckoutController::class, 'showCheckoutForm']);
    Route::post("/satin-al", [\App\Http\Controllers\Frontend\CheckoutController::class, 'checkout']);

    Route::get("/profil", [\App\Http\Controllers\Frontend\HomeController::class, 'edit']);
    Route::put("/profil", [\App\Http\Controllers\Frontend\HomeController::class, 'update']);
    Route::put("/profil/change-password", [\App\Http\Controllers\Frontend\HomeController::class, 'changePassword'])->name('profile.change_password');
    Route::put("/profil/add-address", [\App\Http\Controllers\Frontend\HomeController::class, 'addAddress'])->name('profile.addAddress');
});


Route::group(["middleware" => ["auth", "is_admin:10"]], function () {

    Route::resource("/user", \App\Http\Controllers\Admin\UserController::class);
    Route::GET("/user/{user}/change-password", [\App\Http\Controllers\Admin\UserController::class, 'passwordForm']);
    Route::POST("/user/{user}/change-password", [\App\Http\Controllers\Admin\UserController::class, 'changePassword']);
    Route::resource("/categories", \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource("/cars", \App\Http\Controllers\Admin\CarController::class);

    Route::resource("/cars/{car}/images", \App\Http\Controllers\Admin\CarImageController::class);
    Route::resource("/user/{user}/addresses", \App\Http\Controllers\Admin\AddressController::class);
    Route::GET("/cartdetail/{id}/increment", [\App\Http\Controllers\Frontend\CartController::class, 'increment'])->name('cart.increment');
    Route::GET("/cartdetail/{id}/decrement", [\App\Http\Controllers\Frontend\CartController::class, 'decrement'])->name('cart.decrement');
});


Route::group(["middleware" => ["auth", "is_admin"]], function () {

    Route::resource("/cars", \App\Http\Controllers\Admin\CarController::class);
    Route::resource("/cars/{car}/images", \App\Http\Controllers\Admin\CarImageController::class);


});





