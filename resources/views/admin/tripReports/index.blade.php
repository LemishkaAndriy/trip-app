@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.trip_reports.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Trip">
                    <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.trip_reports.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.trip_reports.fields.total') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($driverReports as $driverId => $time)
                        <tr>
                            <td>
                                {{ $driverId ?? '' }}
                            </td>
                            <td>
                                {{ $time ?? '' }}
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
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
            "autoWidth": false
        });
        let table = $('.datatable-Trip:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    </script>
@endsection
