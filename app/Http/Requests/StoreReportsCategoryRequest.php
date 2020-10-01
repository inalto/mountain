<?php

namespace App\Http\Requests;

use App\Models\ReportsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reports_category_create');
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
