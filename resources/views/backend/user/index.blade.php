@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
@section("subtitle","Kullanıcılar")
@section("btn_url",url("/user/create"))
@section("btn_label","Yeni Ekle")
@section("btn_icon","plus")
    @section("content")
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Kullanıcı_id</th>
                <th scope="col">Ad</th>
                <th scope="col">Soyad</th>
                <th scope="col">eposta</th>
                <th scope="col">Aktif K</th>
                <th scope="col">Admin</th>
                <th scope="col">Telefon</th>
                <th scope="col">İslemler</th>


            </tr>
            </thead>
            <tbody>
            @if(count($users)>0)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->is_active}}</td>
                        <td>{{$user->is_admin}}</td>
                        <td>{{$user->tel_no}}</td>
                        <td>

                            <ul class="nav float-start">
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="{{url("/user/$user->user_id/edit")}}">
                                        <span data-feather="edit"></span>
                                        Güncelle
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link list-item-delete text-black" href="{{url("/user/$user->user_id")}}">
                                        <span data-feather="trash-2"></span>
                                        Sil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black"
                                       href="{{url("/user/$user->user_id/change-password")}}">
                                        <span data-feather="lock"></span>
                                        Şifre Değiştir
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-black"
                                       href="{{url("/user/$user->user_id/addresses")}}">
                                        <span data-feather="lock"></span>
                                        Adres
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8"><p class="text-center">Kullanıcı Bulunamadı</p></td>
                </tr>
            @endif
            </tbody>
        </table>

    @endsection

