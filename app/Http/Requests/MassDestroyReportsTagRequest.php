<?php

namespace App\Http\Requests;

use App\Models\ReportsTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReportsTagRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reports_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reports_tags,id',
        ];
    }
}
