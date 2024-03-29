<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableReservationRequest extends FormRequest
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
        return [
            'name' => 'required|max:120',
            'persons' => 'required',
            'date' => 'required|date_format:Y-m-d|after:today',
            'time' => 'required',
            'phone' => 'required|min:11|numeric',
        ];
    }
}


