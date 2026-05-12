<?php

return [
    'models' => [
        'thread' => BalajiDharma\LaravelForum\Models\Thread::class,
    ],

    'table_names' => [
        'threads' => 'threads',
    ],

    'category_name' => 'forum_category',

    'tag_name' => 'forum_tag',

    'status' => [
        'pending' => 0,
        'approved' => 1,
        'rejected' => 2,
        'spam' => 3,
        'locked' => 4,
    ],
];
