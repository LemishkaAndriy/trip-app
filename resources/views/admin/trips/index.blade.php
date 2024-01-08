@extends('layouts.admin')
@section('content')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.trips.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.trip.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Trip', 'route' => 'admin.trips.parseCsvImport'])
            </div>
        </div>
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.trip.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Trip">
                    <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.trip.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.trip.fields.trip') }}
                        </th>
                        <th>
                            {{ trans('cruds.trip.fields.driver') }}
                        </th>
                        <th>
                            {{ trans('cruds.trip.fields.pick_up') }}
                        </th>
                        <th>
                            {{ trans('cruds.trip.fields.drop_off') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trips as $key => $trip)
                        <tr data-entry-id="{{ $trip->id }}">
                            <td>
                                {{ $trip->id ?? '' }}
                            </td>
                            <td>
                                {{ $trip->trip ?? '' }}
                            </td>
                            <td>
                                {{ $trip->driver ?? '' }}
                            </td>
                            <td>
                                {{ $trip->pick_up ?? '' }}
                            </td>
                            <td>
                                {{ $trip->drop_off ?? '' }}
                            </td>
                            <td>

                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trips.show', $trip->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trips.edit', $trip->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>

                                    <form action="{{ route('admin.trips.destroy', $trip->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
        })
    </script>
@endsection
