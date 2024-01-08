<?php
return [
    'trip' => [
        'title'          => 'Trip',
        'title_singular' => 'Trip',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'trip'              => 'Trip ID',
            'trip_helper'       => ' ',
            'driver'            => 'Driver ID',
            'driver_helper'     => ' ',
            'pick_up'           => 'Pick up',
            'pick_up_helper'    => ' ',
            'drop_off'          => 'Drop off',
            'drop_off_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'trip_reports' => [
        'title'          => 'Trip reports',
        'title_singular' => 'Trip reports',
        'fields'         => [
            'driver'            => 'Driver ID',
            'total'             => 'Total time in minutes'
        ],
    ],
];
