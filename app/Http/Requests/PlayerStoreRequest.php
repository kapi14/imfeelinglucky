<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => ['required'],
            'phone' => ['required'],
        ];
    }
}
