<?php

namespace App\Http\Requests;

use App\Models\Trip;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTripRequest extends FormRequest
{
    public function rules()
    {
        return [
            'trip' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'driver' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pick_up' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'drop_off' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
