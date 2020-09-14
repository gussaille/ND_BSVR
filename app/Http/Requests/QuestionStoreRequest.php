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
        $rules = [
            "answers" => "array|min:19",
            "answers.*.question_id" => "required",
            "answers.*.response" => "required|string"
        ];

        return $rules;
    }


    public function  messages()
    {
        $messages = [ 
            'answers.min' => 'Veuillez remplir tous les champs.', 
            'answers.*.response.required' => 'Veuillez renseigner le champ'
        ];
        
        return $messages;
    }
}
