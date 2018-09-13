<?php

namespace App\Http\Requests\Skills;

use Illuminate\Foundation\Http\FormRequest;

class SkillsCreate extends FormRequest
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
            'skills' =>'required|string|max:255|'
        ];
    }
}
