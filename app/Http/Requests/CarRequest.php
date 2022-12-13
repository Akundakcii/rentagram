<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  CarRequest extends FormRequest
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
        //$category_id =$this->request->get("category_id");
        return [

          'category_id'=>"required|numeric",
            'name'=>"required",
            'km'=>"required|numeric",
            'model'=>"required|numeric",
            'brand'=>"required",
            'price'=>"required|numeric",
            'fuel'=>"required",
            'engine'=>"required|numeric",
            'old_price'=>"required|sometimes|numeric",



        ];
    }public function messages()
{
    return [
        "category_id.required" => "Bu alan zorunludur.",
        "category_id.numeric" => "Bu alan sayısaldır.",
        "name.required" => "Bu alan zorunludur.",
        "km.required" => "Bu alan zorunludur.",
        "km.numeric" => "Bu alan sayısaldır.",
        "brand.required" => "Bu alan zorunludur.",
        "model.required" => "Bu alan zorunludur.",
        "price.required" => "Bu alan zorunludur.",
        "price.numeric" => "Bu alan sayısaldır.",
        "fuel.required" => "Bu alan zorunludur.",
        "engine.required" => "Bu alan zorunludur.",
        "engine.numeric" => "Bu alan sayısaldır."

    ];
}

    protected function passedValidation()
    {
       if (!$this->request->has("slug")) {
            $name = $this->request->get("name");
            $slug = Str::of($name)->slug();
            $this->request->set("slug", $slug);
        }
    }
}
