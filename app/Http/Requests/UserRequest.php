<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class  UserRequest extends FormRequest
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
        $user_id = $this->request->get("user_id");
        return [
            'name' => "required|sometimes|min:3",
            'surname' => "required|sometimes|min:3",
            'tel_no' => "required|min:10|sometimes|integer",
            'email' => "required|email|sometimes|unique:App\Models\User,email,$user_id",
            'password' => "required|sometimes|string|min:6|confirmed",
            'is_admin' => "required",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bu alan zorunludur.",
            "is_admin.required" => "Bu alan zorunludur.",
            "name.min" => "Ad soyad alanı en az 3 karakterden oluşmalıdır.",
            "surname.required" => "Bu alan zorunludur.",
            "surname.min" => "Soyad alanı en az 3 karakterden oluşmalıdır.",
            "tel_no.required" => "Bu alan zorunludur.",
            "tel_no.min" => "Telefon alanı en az 10 Sayıdan oluşmalıdır..",
            "tel_no.integer" => "Bu Alan sadece sayılardan oluşmalıdır.",
            "email.required" => "Bu alan zorunludur.",
            "email.email" => "Girdiğiniz değer eposta formatına uygun olmalıdır.",
            "email.unique" => "Girdiğiniz eposta sistemde kayıtlıdır.",
            "password.required" => "Bu alan zorunludur.",
            "password.min" => "Şifre alanı en az 6 karakterden oluşmalıdır.",
            "password.confirmed" => "Girilen şifreler aynı değildir.",
        ];
    }
}
