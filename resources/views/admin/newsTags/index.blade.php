@extends('layouts.admin')
@section('content')
@can('news_tag_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.news-tags.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.newsTag.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.newsTag.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-NewsTag">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.newsTag.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsTag.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.newsTag.fields.slug') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newsTags as $key => $newsTag)
                        <tr data-entry-id="{{ $newsTag->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $newsTag->id ?? '' }}
                            </td>
                            <td>
                                {{ $newsTag->name ?? '' }}
                            </td>
                            <td>
                                {{ $newsTag->slug ?? '' }}
                            </td>
                            <td>
                                @can('news_tag_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.news-tags.show', $newsTag->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('news_tag_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.news-tags.edit', $newsTag->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('news_tag_delete')
                                    <form action="{{ route('admin.news-tags.destroy', $newsTag->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('news_tag_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.news-tags.massDestroy') }}",
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
  let table = $('.datatable-NewsTag:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection