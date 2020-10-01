<?php

namespace App\Http\Requests;

use App\Models\Poi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePoiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('poi_create');
    }

    public function rules()
    {
        return [
            'name'   => [
                'string',
                'required',
            ],
            'lat'    => [
                'string',
                'nullable',
            ],
            'lon'    => [
                'string',
                'nullable',
            ],
            'height' => [
                'string',
                'nullable',
            ],
        ];
    }
}
