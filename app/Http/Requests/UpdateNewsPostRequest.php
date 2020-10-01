<?php

namespace App\Http\Requests;

use App\Models\NewsPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsPostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_post_edit');
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
