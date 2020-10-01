<?php

namespace App\Http\Requests;

use App\Models\ReportsTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReportsTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reports_tag_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
