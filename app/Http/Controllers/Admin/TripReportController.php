<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trip;

class TripReportController extends Controller
{
    public function index()
    {
        $driverReports = [];
        $trips = Trip::all();
        $tripsByDriver = $trips->groupBy('driver');
        foreach ($tripsByDriver as $driverId => $tripsForDriver) {
            $driverReports[$driverId] = 0;
            $currentTripEnd = null;
            $tripsForDriver = collect($tripsForDriver)->sortBy('pick_up');
            foreach ($tripsForDriver as $trip) {
                if ($currentTripEnd && $trip->pick_up_date <= $currentTripEnd) {
                    $driverReports[$driverId] += $currentTripEnd->diffInMinutes($trip->drop_off_date);
                } else {
                    $driverReports[$driverId] += $trip->drop_off_date->diffInMinutes($trip->pick_up_date);
                    $currentTripEnd = $trip->drop_off_date;
                }
            }
        }

        return view('admin.tripReports.index', compact('driverReports'));
    }
}
