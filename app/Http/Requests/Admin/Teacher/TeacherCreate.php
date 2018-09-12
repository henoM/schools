<?php

namespace App\Http\Requests\Admin\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TeacherCreate extends FormRequest
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
        ];

    }


    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {

        $password = str_random(6);
        $validator = parent::getValidatorInstance();
        if (!$validator->fails())
        {
            $input = $this->all();
            $input['password'] = Hash::make( $password );
            $input['role_id'] = 2;
            $this->replace($input);
        }

        return $validator;
    }
}
