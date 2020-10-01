<?php

namespace App\Http\Requests;

use App\Models\Report;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('report_edit');
    }

    public function rules()
    {
        return [
            'title'        => [
                'string',
                'required',
            ],
            'slug'         => [
                'string',
                'nullable',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'array',
            ],
            'tags.*'       => [
                'integer',
            ],
            'tags'         => [
                'array',
            ],
        ];
    }
}
