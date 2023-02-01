<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
       $roles = User::$roles ;
       $roles["name"] = "required";
       $roles["confirm-password"] = "required|same:password" ;
       $roles["national_id"] = "required|max:14" ;
       return $roles ;
    }
}
