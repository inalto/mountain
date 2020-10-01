<?php

namespace App\Http\Requests;

use App\Models\NewsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_category_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'slug'  => [
                'string',
                'nullable',
            ],
        ];
    }
}
