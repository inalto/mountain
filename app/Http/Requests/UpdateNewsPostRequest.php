<?php

namespace App\Http\Requests;

use App\NewsPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsPostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('news_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'        => [
                'string',
                'required',
            ],
            'tags.*'       => [
                'integer',
            ],
            'tags'         => [
                'array',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'array',
            ],
        ];
    }
}
