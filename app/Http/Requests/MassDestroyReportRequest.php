<?php

namespace App\Http\Requests;

use App\Report;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reports,id',
        ];
    }
}
