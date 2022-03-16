<x-admin-layout>

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.reportsCategory.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.reports-categories.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.reportsCategory.fields.id') }}
                            </th>
                            <td>
                                {{ $reportsCategory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportsCategory.fields.title') }}
                            </th>
                            <td>
                                {{ $reportsCategory->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportsCategory.fields.slug') }}
                            </th>
                            <td>
                                {{ $reportsCategory->slug }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reportsCategory.fields.description') }}
                            </th>
                            <td>
                                {!! $reportsCategory->description !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.reports-categories.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#categories_reports" role="tab" data-toggle="tab">
                    {{ trans('cruds.report.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="categories_reports">
                @includeIf('admin.reportsCategories.relationships.categoriesReports', ['reports' =>
                $reportsCategory->categoriesReports])
            </div>
        </div>
    </div>

</x-admin-layout>
