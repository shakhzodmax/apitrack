<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => '',
        'host'           => '194.58.80.26',
        'port'           => '1521',
        'database'       => '',
        'service_name'   => 'pdbgkkbase',
        'username'       => '',
        'password'       => '',
        'charset'        => 'AL32UTF8',
        'prefix'         => '',
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'edition'        => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
        'load_balance'   => env('DB_LOAD_BALANCE', 'yes'),
        'dynamic'        => [],
    ],
    'sessionVars' => [
        'NLS_TIME_FORMAT'         => 'HH24:MI:SS',
        'NLS_DATE_FORMAT'         => 'YYYY-MM-DD HH24:MI:SS',
        'NLS_TIMESTAMP_FORMAT'    => 'YYYY-MM-DD HH24:MI:SS',
        'NLS_TIMESTAMP_TZ_FORMAT' => 'YYYY-MM-DD HH24:MI:SS TZH:TZM',
        'NLS_NUMERIC_CHARACTERS'  => '.,',
    ],
];
