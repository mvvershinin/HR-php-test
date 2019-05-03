<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateOrder extends FormRequest
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
            'client_email'=>'required|email',
            'partner_id'=> 'required|integer',
            'status' => 'required|integer'
        ];
    }
}