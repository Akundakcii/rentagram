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
            <h5>Araçlar</h5>
            @if(count($cars) > 0)
                <div class="card-group row">
                    @foreach($cars as $car)
                        <div class="col-md-4">
                            <div class="card" style="min-height: 380px">
                                @if($car->images->isNotEmpty())
                                    <div
                                        style="background: url('{{asset("/storage/cars/".$car->images[0]->image_url)}}'); background-size: cover; height: 150px; width: 100%"
                                        class="card-img-top" alt="{{$car->images[0]->alt}} "></div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$car->name}}</h5>
                                    <h6 class="card-title">Fiyat: {{$car->price}}TL</h6>
                                    <p class="card-text">{{$car->description }}</p>
                                    <a href="/sepetim/ekle/{{$car->car_id}}" class="btn btn-primary">Sepete Ekle</a>
                                    <a href="/ilan/{{$car->slug}}" class="btn btn-primary">İlan</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <H4> ARAÇ BULUNAMADI.</H4>
            @endif
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{asset("js/app.js")}}"></script>
</html>
