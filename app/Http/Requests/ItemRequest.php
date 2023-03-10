<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'item_name'=>'required',
            'status' => 'required|numeric',
        ];
    }

    // Custom message send
    public function messages()
    {
        return [
            'item_name.required'=>'Please Enter Item Name',
            'status.required'=>'Please Select Status',
        ];
    }
}
