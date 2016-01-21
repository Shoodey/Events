<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request
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
            'name' => 'required|max:255|alpha_space',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|exists:roles,id'
        ];

        if($this->method() == 'PUT'){
            $id = $this->route()->parameters()['users'];

            $rules['email'] = 'required|email|max:255|unique:users,email,'.$id;
            $rules['password'] = 'confirmed|min:6';

            if($this->request->get('password')){
                $rules['password'] = 'required|confirmed|min:6';
            }
        }

        return $rules;
    }
}
