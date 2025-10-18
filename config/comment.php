<?php

return [
    'models' => [
        'comment' => BalajiDharma\LaravelComment\Models\Comment::class,
    ],

    'table_names' => [
        'comments' => 'comments',
    ],

    'default_status' => 1,

    'status' => [
        'pending' => 0,
        'approved' => 1,
        'rejected' => 2,
        'spam' => 3,
    ],
];
