@extends('layouts.admin')
@section('content')
@can('reports_tag_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.reports-tags.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reportsTag.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.reportsTag.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ReportsTag">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reportsTag.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reportsTag.fields.name') }}
                        </th>
                        <th>

                            {{ trans('cruds.reportsTag.fields.slug') }}

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportsTags as $key => $reportsTag)
                        <tr data-entry-id="{{ $reportsTag->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reportsTag->id ?? '' }}
                            </td>
                            <td>
                                {{ $reportsTag->name ?? '' }}
                            </td>
                            <td>

                                {{ $reportsTag->slug ?? '' }}

                            </td>
                            <td>
                                @can('reports_tag_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.reports-tags.show', $reportsTag->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('reports_tag_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.reports-tags.edit', $reportsTag->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('reports_tag_delete')
                                    <form action="{{ route('admin.reports-tags.destroy', $reportsTag->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('reports_tag_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reports-tags.massDestroy') }}",
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
  let table = $('.datatable-ReportsTag:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection