<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  CarImageRequest extends FormRequest
{
    /**
     * Determine if the cart is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
         'car_id'=>"required|numeric",
            'image_url'=>"required|image|mimes:jpg,jpeg,png|sometimes",


        ];
    }public function messages()
{
    return [
       "car_id.required" => "Bu alan zorunludur.",
        "car_id.min" => "Ad soyad alanı en az 3 karakterden oluşmalıdır.",
        "image_url.required" => "Bu alan zorunludur.",
        "image_url.mimes" => "Sadec .Jpg,.jpeg,.png yuklenır.",

    ];
}

   /* protected function passedValidation()
    {
        if (!$this->request->has("slug")) {
            $name = $this->request->get("name");
            $slug = Str::of($name)->slug();
            $this->request->set("slug", $slug);
        }
    }*/
}
