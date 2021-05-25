<div class="m-3">
    @can('report_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.reports.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.report.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.report.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-tagsReports">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.report.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.slug') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.difficulty') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.excerpt') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.photos') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.tracks') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.created_at') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.tags') }}
                            </th>
                            <th>
                                {{ trans('cruds.report.fields.categories') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $key => $report)
                            <tr data-entry-id="{{ $report->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $report->id ?? '' }}
                                </td>
                                <td>
                                    {{ $report->title ?? '' }}
                                </td>
                                <td>
                                    {{ $report->slug ?? '' }}
                                </td>
                                <td>
                                    {{ App\Report::DIFFICULTY_SELECT[$report->difficulty] ?? '' }}
                                </td>
                                <td>
                                    {{ $report->excerpt ?? '' }}
                                </td>
                                <td>
                                    @foreach($report->photos as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $media->getUrl('thumb') }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($report->tracks as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $report->created_at ?? '' }}
                                </td>
                                <td>
                                    {{ $report->tags->name ?? '' }}
                                </td>
                                <td>
                                    @foreach($report->categories as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('report_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.reports.show', $report->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('report_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.reports.edit', $report->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('report_delete')
                                        <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('report_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reports.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-tagsReports:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection