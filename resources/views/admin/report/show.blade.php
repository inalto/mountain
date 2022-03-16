<x-admin-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.report.title_singular') }}:
                    {{ trans('cruds.report.fields.id') }}
                    {{ $report->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.id') }}
                            </th>
                            <td>
                                {{ $report->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.title') }}
                            </th>
                            <td>
                                {{ $report->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.slug') }}
                            </th>
                            <td>
                                {{ $report->slug }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.difficulty') }}
                            </th>
                            <td>
                                {{ $report->difficulty_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.excerpt') }}
                            </th>
                            <td>
                                {{ $report->excerpt }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.content') }}
                            </th>
                            <td>
                                {{ $report->content }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.photo') }}
                            </th>
                            <td>
                                @foreach ($report->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}"
                                            title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.tracks') }}
                            </th>
                            <td>
                                @foreach ($report->tracks as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.tags') }}
                            </th>
                            <td>
                                @foreach ($report->tags as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.report.fields.categories') }}
                            </th>
                            <td>
                                @foreach ($report->categories as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
