<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PermissionsRequest extends Request
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
            'name' => 'required|min:4|unique:permissions|alpha_dash',
            'display_name' => 'required|min:4|unique:permissions|regex:/^[\pL\s]+$/u',
            'model' => 'required|min:4|alpha',
            'description' => 'max:255'
        ];

        if($this->method() == 'PUT'){
            $id = $this->route()->parameters()['permissions'];

            $rules['name'] = 'required|min:4|alpha_dash|unique:permissions,name,'.$id;
            $rules['display_name'] = 'required|min:4|regex:/^[\pL\s]+$/u|unique:permissions,display_name,'.$id;
        }

        return $rules;
    }

}
