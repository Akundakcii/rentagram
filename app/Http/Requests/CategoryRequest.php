<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  CategoryRequest extends FormRequest
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
         'name'=>"required|min:3",
          'slug'=>"required|sometimes|unique:App\Models\Category,slug",

        ];
    }public function messages()
{
    return [
       "name.required" => "Bu alan zorunludur.",
        "name.min" => "Ad soyad alanı en az 3 karakterden oluşmalıdır.",
        "slug.required" => "Bu alan zorunludur.",
        "slug.unique" => "Aynı :attribute  var."

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
