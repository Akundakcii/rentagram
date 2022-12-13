<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{




 public function __construct()
{
    $this->returnUrl = "/user";
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view("backend.user.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.user.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $name = $request->get("name");
        $surname = $request->get("surname");

        $email = $request->get("email");
        $tel_no = $request->get("tel_no");
        $password = $request->get("password");
        $is_admin = $request->get("is_admin", default: 0);
        $is_active = $request->get("is_active", default: 0);


   $user = new User();
        $user->name = $name;
        $user->surname = $surname;

        $user->email = $email;
        $user->tel_no = $tel_no;
        $user->password = Hash::make($password);
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;


  //Güncelleştirme Çalışmadığı için kodlar kısıltılmadı
       /* $data=$this->prepare($request,$user->getFillable());
         $user->fill($data);
         $user->password=Hash::make($user->password);*/
        $user->save();


        //dd($request->all());

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view("backend.user.update_form", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\UserRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $name = $request->get("name");
        $surname = $request->get("surname");

        $email = $request->get("email");
        $tel_no = $request->get("tel_no");
        $is_admin = $request->get("is_admin", default: 0);
        $is_active = $request->get("is_active", default: 0);

        $user->name = $name;
        $user->surname = $surname;

        $user->email = $email;
        $user->tel_no = $tel_no;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;


        //Güncelleştirme Çalışmadığı için kodlar kısıltılmadı
        /*  $data=$this->prepare($request,$user->getFillable());
        $user->fill($data);*/
         $user->save();


        return Redirect::to($this->returnUrl);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::to($this->returnUrl);

    }

    /**
     * Show the form for changing password.
     *
     * @return View
     */

    public function passwordForm(User $user)
    {

        return view("backend.user.password_form", ["user" => $user]);
    }

    public function changePassword(User $user, UserRequest $request)
    {
        $password = $request->get("password");
        $user->password = Hash::make($password);
        $user->save();
        return Redirect::to($this->returnUrl);;
    }


}
