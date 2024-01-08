<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'trips';

    protected $dates = [
        'pick_up',
        'drop_off',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'trip',
        'driver',
        'pick_up',
        'drop_off',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getPickUpDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->pick_up);
    }

    public function getPickUpAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPickUpAttribute($value)
    {
        $this->attributes['pick_up'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDropOffDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->drop_off);
    }

    public function getDropOffAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDropOffAttribute($value)
    {
        $this->attributes['drop_off'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
