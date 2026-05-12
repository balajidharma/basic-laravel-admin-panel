<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Prefix Settings
    |--------------------------------------------------------------------------
    |
    | Admin default prefix is "admin".
    | You can override the value by setting new prefix instead of admin.
    |
    */
    'prefix' => env('ADMIN_PREFIX', 'admin'),

    /*
    |--------------------------------------------------------------------------
    | Admin Pagination Settings
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default pagination settings for your application.
    |
    */
    'paginate' => [
        'per_page' => 10,
        'each_side' => 2,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Roles Settings
    |--------------------------------------------------------------------------
    |
    | Super Admin default role name is "super-admin".
    | You can override the value by setting new role name.
    |
    */
    'roles' => [
        'super_admin' => env('APP_ROLE_SUPER_ADMIN', 'super-admin'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Permission Settings
    |--------------------------------------------------------------------------
    |
    | Admin User default permission name to access admin pages.
    | You can override the value by setting new permission name.
    |
    */
    'permission' => [
        'access_admin' => env('APP_PERMISSION_ACCESS_ADMIN', 'admin user'),
        'grid' => [
            'permission' => \BalajiDharma\LaravelAdminCore\Grid\PermissionGrid::class,
        ],
    ],

    'super_admin' => env('APP_SUPER_ADMIN', 'super-admin'),

    /*
    |--------------------------------------------------------------------------
    | Admin Tags Settings
    |--------------------------------------------------------------------------
    |
    | admin_tag is default machine name for admin tags.
    | You can override the value by setting category machine name.
    |
    */
    'tag_name' => env('ADMIN_TAG_MACHINE_NAME', 'admin_tag'),

    'activitylog' => [
        'grid' => [
            'activitylog' => \BalajiDharma\LaravelAdminCore\Grid\ActivityLogGrid::class,
        ],
    ],

    'comment' => [
        'grid' => [
            'comment' => \BalajiDharma\LaravelAdminCore\Grid\CommentGrid::class,
        ],
        'commenter_types' => [
            'User' => \App\Models\User::class,
        ],
        'commentable_types' => [
            'Thread' => \BalajiDharma\LaravelForum\Models\Thread::class,
        ],
    ],

    'attributes' => [
        'grid' => [
            'attribute' => \BalajiDharma\LaravelAdminCore\Grid\AttributeGrid::class,
        ],
        'attributable_types' => [
            'Thread' => \BalajiDharma\LaravelForum\Models\Thread::class,
        ],
    ],

    'reaction' => [
        'grid' => [
            'reaction' => \BalajiDharma\LaravelAdminCore\Grid\ReactionGrid::class,
        ],
        'reactor_types' => [
            'User' => \App\Models\User::class,
        ],
        'reactable_types' => [
            'Thread' => \BalajiDharma\LaravelForum\Models\Thread::class,
            'Comment' => \BalajiDharma\LaravelComment\Models\Comment::class,
        ],
    ],

    'category' => [
        'grid' => [
            'category_type' => \BalajiDharma\LaravelAdminCore\Grid\CategoryTypeGrid::class,
            'category_item' => \BalajiDharma\LaravelAdminCore\Grid\CategoryItemGrid::class,
        ],
    ],

    'menu' => [
        'grid' => [
            'menu' => \BalajiDharma\LaravelAdminCore\Grid\MenuGrid::class,
            'menu_item' => \BalajiDharma\LaravelAdminCore\Grid\MenuItemGrid::class,
        ],
    ],

    'media' => [
        'grid' => [
            'media' => \BalajiDharma\LaravelAdminCore\Grid\MediaGrid::class,
        ],
    ],

    'thread' => [
        'grid' => [
            'thread' => \BalajiDharma\LaravelAdminCore\Grid\ThreadGrid::class,
        ],
    ],

    'user' => [
        'grid' => [
            'user' => \BalajiDharma\LaravelAdminCore\Grid\UserGrid::class,
        ],
    ],

    'role' => [
        'grid' => [
            'role' => \BalajiDharma\LaravelAdminCore\Grid\RoleGrid::class,
        ],
    ],
];
