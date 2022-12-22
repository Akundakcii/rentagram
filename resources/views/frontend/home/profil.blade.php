<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RentAGram</title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">RENT A GRAM</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Anasayfa</a>
                            </li>

                            @auth

                                <li class="nav-item">
                                    <a class="nav-link" href="/profil">Bilgilerim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/sepetim">Sepetim</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/cikis">Çıkış</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/giris">Giriş Yap</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/uye-ol">Üye ol</a>
                                </li>
                            @endauth

                        </ul>
                        @auth
                            <ul class="navbar-nav ">
                                <li class="nav-item ">

                                    <span class="nav-link">{{auth()->user()->name}} </span>
                                </li>

                            </ul>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 pt-4">
            <h5>Kategoriler</h5>
            <div class="list-group">
                <a href="/"
                   class="list-group-item list-group-item-action">Hepsi</a>
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <a href="/kategori/{{$category->slug}}"
                           class="list-group-item list-group-item-action">{{$category->name}}</a>
                    @endforeach
                @endif
            </div>
            <h5>Fiyata Göre</h5>
            <form class="mt-2" method="GET">
                <div class="form-group">
                    <label for="min_price">En düşük fiyat</label>
                    <input type="number" name="min_price" class="form-control" id="min_price" placeholder="Alt limit"
                           min="0" value="{{request()->min_price}}">
                </div>
                <div class="form-group">
                    <label for="min_price">En yüksek fiyat</label>
                    <input type="number" name="max_price" class="form-control" id="max_price" placeholder="Üst limit"
                           value="{{request()->max_price}}">
                </div>
                <h5>Km Göre</h5>

                <div class="form-group">
                    <label for="min_price">Min Km</label>
                    <input type="number" name="min_km" class="form-control" id="min_km" placeholder="Alt limit"
                           min="0" value="{{request()->min_km}}">
                </div>
                <div class="form-group">
                    <label for="min_price">Maks Km</label>
                    <input type="number" name="max_km" class="form-control" id="max_km" placeholder="Üst limit"
                           value="{{request()->max_km}}">
                </div>
                <h5>Model Yıl</h5>

                <div class="form-group">
                    <label for="min_price">Min Yıl</label>
                    <input type="number" name="min_model" class="form-control" id="min_model" placeholder="Alt limit"
                           min="0" value="{{request()->min_model}}">
                </div>
                <div class="form-group">
                    <label for="min_price">Maks Yıl</label>
                    <input type="number" name="max_model" class="form-control" id="max_model" placeholder="Üst limit"
                           value="{{request()->max_model}}">
                </div>


                <div class="form-group">
                    <label>Markalar</label>
                    @foreach($brands as $brand)
                        <div class="form-check">
                            <input class="form-check-input" name="brand[]" type="checkbox" value="{{$brand}}"
                                   id="{{$brand}}"
                                @checked(in_array($brand, request()->brand ?? []))
                            >
                            <label class="form-check-label" for="{{$brand}}">
                                {{$brand}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>Yakıt</label>
                    @foreach($fuels as $fuel)
                        <div class="form-check">
                            <input class="form-check-input" name="fuel[]" type="checkbox" value="{{$fuel}}"
                                   id="{{$fuel}}"
                                @checked(in_array($fuel, request()->fuel ?? []))
                            >
                            <label class="form-check-label" for="{{$fuel}}">
                                {{$fuel}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>Şehir</label>
                    @foreach($cities as $city)
                        <div class="form-check">
                            <input class="form-check-input" name="cities[]" type="checkbox" value="{{$city}}"
                                   id="{{$city}}"
                                @checked(in_array($city, request()->cities ?? []))
                            >
                            <label class="form-check-label" for="{{$city}}">
                                {{$city}}
                            </label>
                        </div>
                    @endforeach
                </div>


                <div class="form-group text-end">
                    <button class="btn btn-primary">Ara</button>
                </div>
            </form>
        </div>


        <div class="col-sm-9 pt-4">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach

            <h1 class="h3 mb-3 fw-normal">Bilgilerim</h1>

            <form method="POST">
                @method('PUT')
                @csrf
                <div class="mt-2">
                    <x-input label="İsim" placeholder="" field="name" type="text" :value="$user->name" disabled/>
                </div>
                <div class="mt-2">
                    <x-input label="Soyad" placeholder="" field="surname" type="text" :value="$user->surname" disabled/>
                </div>
                <div class="mt-2">
                    <x-input label="Telefon giriniz" placeholder="Telefon giriniz" field="tel_no" type="text"
                             :value="$user->tel_no"/>
                </div>

                <div class="mt-2">
                    <x-input label="Eposta giriniz" placeholder="Eposta giriniz" field="email" type="email"
                             :value="$user->email"/>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-success">Bilgilerimi Güncelle</button>
                    </div>

                </div>
            </form>
            <H2>Şifre Değiştirme Ekranı</H2>
            <form action="{{route('profile.change_password')}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mt-2">
                    <x-input label="Şifre Giriniz" placeholder="Şifre giriniz" field="password" type="password"/>
                </div>

                <div class="mt-2">
                    <x-input label="Şifre Tekrarı" placeholder="Şifrenizi tekrar giriniz"
                             field="password_confirmation" type="password"/>
                </div>

                <div class="row">
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-success">Şifre Değiştir</button>
                    </div>
                </div>
            </form>

            <div>
                <h2>Adres Güncelle</h2>

                <form method="POST" action="{{ route('profile.addAddress') }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <x-input label="Şehir" placeholder="Şehir giriniz" field="city" type="text" :value="$address->city"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <x-input label="İlçe" placeholder="İlçe giriniz" field="district" type="text" :value="$address->district"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mt-2">
                                <x-input label="Posta Kodu" placeholder="Posta kodu giriniz" field="zipcode"
                                         type="text" :value="$address->zipcode"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="col-lg-6">
                                <x-checkbox field="is_default" label="Varsayılan" :checked="(bool)$address->is_default"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-4">
                                <x-textarea label="Açık Adres" placeholder="Açık adres giriniz" field="address" :value="$address->address"
                                            type="textarea"></x-textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> Adres
                                Güncelle
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="{{asset("js/app.js")}}"></script>
@include('sweetalert::alert')
</html>
