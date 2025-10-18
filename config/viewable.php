<?php

return [
    'models' => [
        'viewable' => BalajiDharma\LaravelViewable\Models\Viewable::class,
    ],

    'table_names' => [
        'viewable' => 'views',
    ],

    'ignore_bots' => true,

    'honor_dnt' => false,

    'unique_ip' => true,

    'unique_session' => true,

    'unique_viewer' => true,

    'increment_model_view_count' => false,

    'increment_model_column_name' => 'view_count',

    'ignored_ip_addresses' => [
        //'127.0.0.1',
    ],
];
