<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'required',
            ],
            'last_name'  => [
                'string',
                'required',
            ],
            'tagline'    => [
                'string',
                'nullable',
            ],
            'birth_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'city'       => [
                'string',
                'nullable',
            ],
            'country'    => [
                'string',
                'nullable',
            ],
            'email'      => [
                'required',
                'unique:users',
            ],
            'password'   => [
                'required',
            ],
            'roles.*'    => [
                'integer',
            ],
            'roles'      => [
                'required',
                'array',
            ],
        ];
    }
}
