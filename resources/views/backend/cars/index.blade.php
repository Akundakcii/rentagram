@extends("backend.shared.backend_theme")
@section("title","Araba Modülü")
@section("subtitle","Arabalar ")
@section("btn_url",url("/cars/create"))
@section("btn_label","Yeni Ekle")
@section("btn_icon","plus")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Araç Id</th>
            <th scope="col">Başlık</th>
            <th scope="col">Kategorisi</th>
            <th scope="col">K.Ekledi</th>
            <th scope="col">Km</th>
            <th scope="col">Model</th>
            <th scope="col">Marka</th>
            <th scope="col">Yakıt</th>
            <th scope="col">Motor</th>
            <th scope="col">Fiyat</th>
            <th scope="col">Açıklama</th>
            <th scope="col">Durumu</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($cars) > 0)
            @foreach($cars as $car)
                <tr id="{{$car->car_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$car->name}}</td>
                    <td>{{$car->category->name}}</td>
                    <td>{{$car->user->name}}</td>
                    <td>{{$car->km}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->brand}}</td>
                    <td>{{$car->fuel}}</td>
                    <td>{{$car->engine}}</td>
                    <td>{{$car->price}}</td>
                    <td>{{$car->description}}</td>


                    <td>
                        @if($car->is_active == 1)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                   href="{{url("/cars/$car->car_id/edit")}}">
                                    <span data-feather="edit"></span>
                                    Güncelle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                   href="{{url("/cars/$car->car_id")}}">
                                    <span data-feather="trash-2"></span>
                                    Sil
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                   href="{{url("/cars/$car->car_id/images")}}">
                                    <span data-feather="image"></span>
                                    Fotoğraflar
                                </a>
                            </li>

                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13">
                    <p class="text-center">Herhangi bir kullanıcı bulunamadı.</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
