<?php

namespace App\Http\Requests;

use App\ReportsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reports_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
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
