@extends('layouts.admin')
@section('content')
@can('poi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pois.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.poi.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.poi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Poi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.lon') }}
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.height') }}
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.bibliography') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pois as $key => $poi)
                        <tr data-entry-id="{{ $poi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $poi->id ?? '' }}
                            </td>
                            <td>
                                {{ $poi->name ?? '' }}
                            </td>
                            <td>
                                {{ $poi->lat ?? '' }}
                            </td>
                            <td>
                                {{ $poi->lon ?? '' }}
                            </td>
                            <td>
                                {{ $poi->height ?? '' }}
                            </td>
                            <td>
                                {{ $poi->bibliography ?? '' }}
                            </td>
                            <td>
                                @can('poi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pois.show', $poi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('poi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pois.edit', $poi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('poi_delete')
                                    <form action="{{ route('admin.pois.destroy', $poi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('poi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pois.massDestroy') }}",
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
  let table = $('.datatable-Poi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection