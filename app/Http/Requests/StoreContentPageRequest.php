<?php

namespace App\Http\Requests;

use App\Models\ContentPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContentPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_page_create');
    }

    public function rules()
    {
        return [
            'title'        => [
                'string',
                'required',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'array',
            ],
            'tags.*'       => [
                'integer',
            ],
            'tags'         => [
                'array',
            ],
        ];
    }
}
