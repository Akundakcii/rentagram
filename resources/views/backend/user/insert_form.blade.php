@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
@section("subtitle","Yeni Kullanıcı Ekle")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")


              <form action="{{url("/user")}} " method="POST">
                  @csrf
                  <div class="row">
                      <div class="col-lg-3">
<x-input label="Ad" placeholder="Ad Giriniz" field="name" type="text" />

                      </div>
                      </div>
                      <div class="col-lg-3">

                          <x-input label="Soyad" placeholder="Soyad Giriniz" field="surname" type="text" />
                      </div>

                  <div class="col-lg-3">

                      <x-input label="Email" placeholder="Email Giriniz" field="email" type="email" />
                  </div>
                  <div class="col-lg-3">

                      <x-input label="Telefon" placeholder="Telefon Giriniz" field="tel_no" type="text" />
                  </div>
                  <div class="row">
                      <div class="col-lg-3">


                          <x-input label="Şifre" placeholder="Şifre Giriniz" field="password" type="password"/>
                      </div>
                  </div>
                  <div class="col-lg-3">

                      <x-input label="Şifre" placeholder="Şifre Giriniz" field="password_confirmation" type="password" />
                  </div>

                  <div class="row">
                      <div class="col-lg-3">


                          <div class="form-check mt-2">

                              <select name="is_admin" >
                                  <option selected></option>
                                  <option value="0">Üye</option>
                                  <option value="1">Admin</option>
                                  <option value="10">Süper Admin</option>
                              </select>

                          </div>

                      </div>
                      <div class="col-lg-3">

                              <x-checkbox field="is_active" label="Akftif kullanıcı"/>

                          </div>
                      </div>
                  </div>
<div class="row">
    <div class="col-12 mt-2">
        <button type="submit" class="btn btn-success">Kaydet</button>
    </div>

</div>



              </form>
@endsection
