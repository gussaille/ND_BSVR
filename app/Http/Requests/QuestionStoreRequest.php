<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
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
            "answered.*.question_id" => "required",
            "answered.*.response" => "required|string"
        ];
    }


    public function  messages()
    {
        return [ 'response.required' => 'Champs requis', 'response.string' => 'doit être une chaine de caractère'];
    }
}
