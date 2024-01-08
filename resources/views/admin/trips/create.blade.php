@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.trip.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.trips.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="trip">{{ trans('cruds.trip.fields.trip') }}</label>
                    <input class="form-control {{ $errors->has('trip') ? 'is-invalid' : '' }}" type="number" name="trip" id="trip" value="{{ old('trip', '') }}" step="1" required>
                    @if($errors->has('trip'))
                        <div class="invalid-feedback">
                            {{ $errors->first('trip') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.trip.fields.trip_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="driver">{{ trans('cruds.trip.fields.driver') }}</label>
                    <input class="form-control {{ $errors->has('driver') ? 'is-invalid' : '' }}" type="number" name="driver" id="driver" value="{{ old('driver', '') }}" step="1" required>
                    @if($errors->has('driver'))
                        <div class="invalid-feedback">
                            {{ $errors->first('driver') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.trip.fields.driver_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="pick_up">{{ trans('cruds.trip.fields.pick_up') }}</label>
                    <input class="form-control datetime {{ $errors->has('pick_up') ? 'is-invalid' : '' }}" type="text" name="pick_up" id="pick_up" value="{{ old('pick_up') }}" required>
                    @if($errors->has('pick_up'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pick_up') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.trip.fields.pick_up_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="drop_off">{{ trans('cruds.trip.fields.drop_off') }}</label>
                    <input class="form-control datetime {{ $errors->has('drop_off') ? 'is-invalid' : '' }}" type="text" name="drop_off" id="drop_off" value="{{ old('drop_off') }}" required>
                    @if($errors->has('drop_off'))
                        <div class="invalid-feedback">
                            {{ $errors->first('drop_off') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.trip.fields.drop_off_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
