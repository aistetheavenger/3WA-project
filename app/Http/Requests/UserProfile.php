<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserProfile extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $user=Auth::user();

        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'birthdate' => 'required|date|before:today',
            'surname'=> 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
            'city'  => 'required|max:255',
            'zip' => 'required|numeric',
            'country' => 'required|max:255',
            'password' => 'min:6|confirmed',
        ];
    }
}
