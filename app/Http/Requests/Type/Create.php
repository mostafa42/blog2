<?php

namespace App\Http\Requests\Type;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
 
class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            "type_code" => "required|unique:types",
            "type_description_ar" => "required",
            "type_description_en" => "required",
            "document_code" => "required|unique:types",
            "document_description_ar" => "required",
            "document_description_en" => "required",
        ];
    }
}