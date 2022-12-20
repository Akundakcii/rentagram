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
                    <a class="navbar-brand" href="/">Rent A Gram</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Anasayfa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/adress">Bilgilerim</a>
                            </li>
                            @auth()
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

            <form class="mt-2" method="GET">
                <div class="form-group">
                    <label for="min_price">En düşük fiyat</label>
                    <input type="number" name="min_price" class="form-control" id="min_price" placeholder="Alt limit" min="0" value="{{request()->min_price}}">
                </div>
                <div class="form-group">
                    <label for="min_price">En yüksek fiyat</label>
                    <input type="number" name="max_price" class="form-control" id="max_price" placeholder="Üst limit" value="{{request()->max_price}}">
                </div>


                <div class="form-group">
                    <label>Markalar</label>
                    @foreach($brands as $brand)
                        <div class="form-check">
                            <input class="form-check-input" name="brand[]" type="checkbox" value="{{$brand}}" id="{{$brand}}"
                                   @checked(in_array($brand, request()->brand ?? []))
                            >
                            <label class="form-check-label" for="{{$brand}}">
                                {{$brand}}
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
                                    <div style="background: url('{{asset("/storage/cars/".$car->images[0]->image_url)}}'); background-size: cover; height: 150px; width: 100%"
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
            @endif
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{asset("js/app.js")}}"></script>
</html>
