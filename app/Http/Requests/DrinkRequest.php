<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class DrinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "drink" => "required | max:20",
            "amount" => "required | numeric",
            "type" => "required",
            "package" => "required"
        ];
    }

    public function messages() {
        return [
            "drink.required" => "Név mező nem lehet üres!",
            "drink.max" => "Túl hosszú név!",
            "drink.required" => "Mennyiség mező nem lehet üres!",
            "drink.amount" => "Mennyiség csak szám lehet!",
            "drink.type" => "Típus mező nem lehet üres!",
            "drink.package" => "Kiszerelés mező nem lehet üres!"
        ];
    }

    public function failedValidation( Validator $validator ) {
        throw new HttpResponseException( response()->json([
            "success" => false,
            "error" => $validator->errors(),
            "message" => "Adatbeviteli hiba!"
        ]));
    }
}
