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
