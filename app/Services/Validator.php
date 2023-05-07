<?php

namespace App\Services;

class Validator
{
    public function rules($rules)
    {
        foreach($rules as $key => $rule){
            $a = explode("|",$rule);
            dd($a);
        }
        // for($i=0; $i<count($rules); $i++) {
        //     dd($rules);
        // }
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