  @extends("backend.shared.backend_theme")
@section("title","Araçlar Modülü")
@section("subtitle","Güncelleme")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <form action="{{url("/cars/$car->car_id/images/$image->image_id")}}" method="POST" autocomplete="off" novalidate
          enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <input type="hidden" name="car_id" value="{{$car->car_id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Dosya Yükle" placeholder="" field="image_url" type="file"/>
               <img src="{{asset("/storage/cars/$image->image_url")}}" alt="{{$image->alt}}" width="100">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Açıklama" placeholder="Kısa açıklama girinizi" field="alt" type="text" value="{{$image->alt}}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Sıra No" placeholder="Sıra no giriniz" field="seq" value="{{$image->seq}}" type="text"/>
                </div>
            </div>
            <div class="col-lg-6">
                <x-checkbox field="is_active" label="Aktif" checked="{{$image->is_active==1}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> KAYDET
                </button>
            </div>
        </div>
    </form>
@endsection
