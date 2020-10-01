<?php

namespace App\Http\Requests;

use App\Models\ContentTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContentTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_tag_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
