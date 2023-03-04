<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'item_id'=>'required|numeric',
            'task_name'=>'required',
            'status' => 'required|numeric',
        ];
    }

    // Custom message send
    public function messages()
    {
        return [
            'item_id.required'=>'Item ID Must Be Required',
            'task_name.required'=>'Please Enter Task Name',
            'status.required'=>'Please Select Status',
        ];
    }
}
