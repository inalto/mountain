<?php

namespace App\Http\Requests;

use App\NewsPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNewsPostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('news_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:news_posts,id',
        ];
    }
}
