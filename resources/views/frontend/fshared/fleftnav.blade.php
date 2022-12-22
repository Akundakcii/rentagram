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
</div>
