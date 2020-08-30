<?php

namespace App\Http\Requests;

use App\Poi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePoiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('poi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
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
