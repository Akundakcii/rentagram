@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
@section("subtitle","Şifre Değiştirme")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
              <form action="{{url("/user/$user->user_id/change-password")}}" method="POST" autocomplete="off" novalidate >
                  @csrf

                  <div class="row">
                      <div class="col-lg-3">


                          <x-input label="Şifre" placeholder="Şifre Giriniz" field="password" type="password"/>
                      </div>
                  </div>
                  <div class="col-lg-3">

                      <x-input label="Şifre" placeholder="Şifre Giriniz" field="password_confirmation" type="password" />
                  </div>



                  <div class="row">
    <div class="col-12 mt-2">
        <button type="submit" class="btn btn-success">Kaydet</button>
    </div>

</div>



              </form>
@endsection
