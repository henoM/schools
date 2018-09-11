<?php

namespace App\Http\Requests\Teacher\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreate extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'birth_day' => 'required|string|max:255',
            'passport' => 'required|string|max:255|unique:users',
        ];

    }

    /**
     * @return array
     */
    public function inputs()
    {
        $request = $this->except('_token');
        $request['role_id'] = 3;
        $request['password'] = bcrypt(123456);
        return $request;
    }
}
