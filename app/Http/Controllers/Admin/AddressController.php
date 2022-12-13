<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarImageRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/user/{}/addresses";
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(User $user): View
    {
        $addrs = $user->addrs;
        return view("backend.addresses.index", ["addrs" => $addrs, "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(User $user): View
    {
        return view("backend.addresses.insert_form", ["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     * @param CarImageRequest $request
     * @return RedirectResponse
     */
    public function store(CarImageRequest $request, User $user): RedirectResponse
    {
        $addr = new Address();
        $data = $this->prepare($request, $addr->getFillable());
        $addr->fill($data);
        $addr->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "/user/$id/addresses";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param Address $address
     * @return View
     */
    public function edit(User $user, Address $address): View
    {
        return view("backend.addresses.update_form", ["user" => $user, "addr" => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarImageRequest $request
     * @param User $user
     * @param Address $address
     * @return RedirectResponse
     */
    public function update(CarImageRequest $request, User $user, Address $address): RedirectResponse
    {
        $data = $this->prepare($request, $address->getFillable());
        $address->fill($data);
        $address->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $user->delete();

        return Redirect::to($this->returnUrl);

    }
}
