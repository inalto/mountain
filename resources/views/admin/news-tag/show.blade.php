<x-admin-layout>
<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.view') }}
                {{ trans('cruds.newsTag.title_singular') }}:
                {{ trans('cruds.newsTag.fields.id') }}
                {{ $newsTag->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.newsTag.fields.id') }}
                        </th>
                        <td>
                            {{ $newsTag->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsTag.fields.name') }}
                        </th>
                        <td>
                            {{ $newsTag->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsTag.fields.slug') }}
                        </th>
                        <td>
                            {{ $newsTag->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('admin.news-tags.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
<x-admin-layout>
