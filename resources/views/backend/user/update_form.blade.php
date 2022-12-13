@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
@section("subtitle","Güncelleme")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")


              <form action="{{url("/user/$user->user_id")}}" method="POST" autocapitalize="off" novalidate>
                  @csrf
                  @method("PUT")
                  <input type="hidden" name ="user_id" value="{{$user->user_id}}">
                  <div class="row">
                      <div class="col-lg-3">
                          <x-input label="Ad" placeholder="Ad Giriniz" field="name" type="text" value="{{$user->name}}" />


                      </div>
                      </div>
                      <div class="col-lg-3">
<x-input label="Soyad" placeholder="Soyad Giriniz" field="surname" type="text" value="{{$user->surname}}" />

                      </div>

                  <div class="col-lg-3">
                      <x-input label="Email" placeholder="Email Giriniz" field="email" type="text" value="{{$user->email}}" />


                  </div>
                  <div class="col-lg-3">
                      <x-input label="Telefon" placeholder="Telefon Giriniz" field="tel_no" type="text" value="{{$user->tel_no}}" />

                  </div>


                  <div class="row">
                      <div class="col-lg-3">
                          <div class="form-check mt-2">
                              <select name="is_admin" >

                                  <option @selected($user->is_admin == 0) value="0">Üye</option>
                                  <option @selected($user->is_admin == 1) value="1">Admin</option>
                                  <option @selected($user->is_admin == 10) value="10">Süper Admin</option>
                              </select>



                      </div>

                          <div class="form-check mt-2">
                              <x-checkbox field="is_active" label="Aktif kullanıcı" checked="{{$user->is_active ==  1}}"/>

                          </div>
                      </div>
                  </div>
<div class="row">
    <div class="col-12 mt-2">
        <button type="submit" class="btn btn-success">Kaydet</button>
    </div>

</div>
                  </div>


              </form>
@endsection
