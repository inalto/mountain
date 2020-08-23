<?php

namespace App\Http\Requests;

use App\NewsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNewsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('news_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:news_categories,id',
        ];
    }
}
