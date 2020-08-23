<?php

namespace App\Http\Requests;

use App\ReportsTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateReportsTagRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reports_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'reports.*' => [
                'integer',
            ],
            'reports'   => [
                'array',
            ],
        ];
    }
}
