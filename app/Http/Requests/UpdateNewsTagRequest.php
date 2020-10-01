<?php

namespace App\Http\Requests;

use App\Models\NewsTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_tag_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
