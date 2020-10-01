<?php

namespace App\Http\Requests;

use App\Models\ContentCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContentCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_category_edit');
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
