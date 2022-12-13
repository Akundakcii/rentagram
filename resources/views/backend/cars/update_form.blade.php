@extends("backend.shared.backend_theme")
@section("title","Kategori Modülü")
@section("subtitle","Kategori Güncelle")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/cars/$car->car_id")}}" method="POST" autocomplete="off" novalidate>
        @csrf
        @method("PUT")
       <input type="hidden" name="car_id" value="{{$car->car_id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <label for="category_id" class="form-label" >Kategori seç</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Seçiniz</option>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->category_id}}" {{$car->category_id == $category->category_id ? "selected" : ""}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Araba adı" placeholder="Araba adı giriniz" field="name" type="text" value="{{$car->name}}"/>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Marka" placeholder="Marka giriniz" field="brand" type="text" value="{{$car->brand}}"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Yakıt" placeholder="Yakıt giriniz" field="fuel" type="text" value="{{$car->fuel}}"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Slug" placeholder="Slug" field="slug" type="text" value="{{$car->slug}}"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Açıklama" placeholder="Açıklama Giriniz" field="description" type="text" value="{{$car->description}}"/>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Km" placeholder="Km giriniz" field="km" type="text" value="{{$car->km}}"/>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Model" placeholder="Model giriniz" field="model" type="text" value="{{$car->model}}"/>
                        </div>
                    </div>



                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Motor" placeholder="Motor giriniz" field="engine" type="text" value="{{$car->engine}}"/>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="mt-2">
                        <x-input label="Fiyat" placeholder="Fiyat giriniz" field="price" type="text" value="{{$car->price}}"/>
                    </div>
                </div>



                <div class="col-lg-6">
                    <x-checkbox field="is_active" label="Aktif Kategori" checked="{{$car->is_active == 1}}" />
                </div>
            </div>
            <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> KAYDET</button>
            </div>
        </div>
        </div>
    </form>

@endsection
