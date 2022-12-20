<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sepetim</title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">PROJE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Anasayfa</a>
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
        </div>


    <div class="col-sm-9 pt-4">
        <h5>Resimler</h5>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="max-width:700px" >
    <div class="carousel-inner"  >
        @foreach($car->images as $image)
            <div  @class(["active" =>$loop->first,"carousel-item"]) >
                <img src="/storage/cars/{{$image->image_url}}" width="700px" height="500px" alt="...">
            </div>

        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>



</div>
        <h2>Bilgiler</h2>
        <div>

            <h5 class="card-title">Başlık: {{$car->name}}</h5>
            <h5 class="card-title">Kilometresi: {{$car->km}}</h5>
            <h5 class="card-title">Model: {{$car->model}}</h5>
            <h5 class="card-title">Markası: {{$car->brand}}</h5>
            <h5 class="card-title">Kim Ekledi: {{$car->user->name}}</h5>
            <h5 class="card-title">Yakıtı: {{$car->fuel}}</h5>
            <h5 class="card-title">Motoru: {{$car->engine}}</h5>
            <h5 class="card-text">Açıklama:{{$car->description }}</h5>
            <h2  class="card-title">Fiyat: {{$car->price}}TL</h2>
            <br>


            <a href="/sepetim/ekle/{{$car->car_id}}" class="btn btn-primary">Sepete Ekle</a>
        </div>


    </div>
    </div>
</div>
<div>


</div>



</body>
</html>




