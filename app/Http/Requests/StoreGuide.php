<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreGuide extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->merge([
            'user_id'=> Auth::id(),
        ]);
        return [
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'author' => ['required','string','max:40'],
            'body' => 'required'
        ];
    }
}
