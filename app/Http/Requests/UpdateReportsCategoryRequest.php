<?php

namespace App\Http\Requests;

use App\ReportsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reports_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
