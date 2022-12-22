@extends("backend.shared.backend_theme")
@section("title","Car Modülü")
@section("subtitle","Yeni Araç Ekle")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/cars")}}" method="POST" autocomplete="off" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <label for="category_id" class="form-label" >Kategori seç</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="-1">Seçiniz</option>
                        @foreach($categories as $category)
                            <option value="{{$category->category_id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                    <span class="text-danger">{{$message}}</span>
                    @enderror

            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Başlık" placeholder="Başlık giriniz" field="name" type="text"/>
                </div>
            </div>

                        <div class="col-lg-6">
                            <div class="mt-2">
                                <x-input label="Marka" placeholder="Marka giriniz" field="brand" type="text"/>
                            </div>
                        </div>
                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Yakıt" placeholder="Yakıt giriniz" field="fuel" type="text"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Slug" placeholder="Slug" field="slug" type="text"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Açıklama" placeholder="Açıklama Giriniz" field="description" type="text"/>
                        </div>
                    </div>

            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Km" placeholder="Km giriniz" field="km" type="text"/>
                </div>
            </div>

                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Model" placeholder="Model giriniz" field="model" type="text"/>
                        </div>
                    </div>



                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Motor" placeholder="Motor giriniz" field="engine" type="text"/>
                        </div>
                    </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="mt-2">
                            <x-input label="Fiyat" placeholder="Fiyat giriniz" field="price" type="text"/>
                        </div>
                    </div>



                    <div class="col-lg-6">
                <x-checkbox field="is_active" label="Aktif Kategori" />
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> KAYDET
                </button>
            </div>
        </div>
            </div>
        </div>
    </form>

@endsection
