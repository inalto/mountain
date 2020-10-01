<?php

namespace App\Http\Requests;

use App\Models\ReportsCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reports_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reports_categories,id',
        ];
    }
}
