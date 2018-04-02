<?php
require 'vendor/autoload.php';

// return an array object with the undotted values
$res = \Axonbits\Arrays::undot([
    'name'                       => 'Yale',
    'timeseries.2014.enrollment' => '1',
    'timeseries.2014.cost'       => '100',
    'timeseries.2015.enrollment' => '200',
    'timeseries.2015.cost'       => '200',
    'groups.colors.default'      => '#white',
    'groups.colors.blue'         => '#lalala',
]);
var_export($res);

// return a json object with the undotted values
$res = \Axonbits\Arrays::toJson()->undot([
    'name'                       => 'Yale',
    'timeseries.2014.enrollment' => '1',
    'timeseries.2014.cost'       => '100',
    'timeseries.2015.enrollment' => '200',
    'timeseries.2015.cost'       => '200',
    'groups.colors.default'      => '#white',
    'groups.colors.blue'         => '#lalala',
]);
var_export($res);
