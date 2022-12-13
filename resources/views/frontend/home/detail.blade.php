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
<div>
    Bilgiler



</div>
</body>


</html>
