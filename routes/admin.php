<?php

use BalajiDharma\LaravelAdmin\Middleware\HasAccessAdmin;

Route::group([
    'prefix' => config('admin.prefix'),
    'middleware' => ['auth', 'verified', HasAccessAdmin::class],
    'as' => 'admin.',
], function () {
    Route::get('/', function () {
        return view('laravel-admin::dashboard');
    })->name('dashboard');
    Route::resource('user', \BalajiDharma\LaravelAdmin\Controllers\UserController::class);
    Route::resource('role', \BalajiDharma\LaravelAdmin\Controllers\RoleController::class);
    Route::resource('permission', \BalajiDharma\LaravelAdmin\Controllers\PermissionController::class);
    Route::resource('media', \BalajiDharma\LaravelAdmin\Controllers\MediaController::class);
    Route::resource('menu', \BalajiDharma\LaravelAdmin\Controllers\MenuController::class)->except([
        'show',
    ]);
    Route::resource('menu.item', \BalajiDharma\LaravelAdmin\Controllers\MenuItemController::class)->except([
        'show',
    ]);
    Route::group([
        'prefix' => 'category',
        'as' => 'category.',
    ], function () {
        Route::resource('type', \BalajiDharma\LaravelAdmin\Controllers\CategoryTypeController::class)->except([
            'show',
        ]);
        Route::resource('type.item', \BalajiDharma\LaravelAdmin\Controllers\CategoryController::class)->except([
            'show',
        ]);
    });
    Route::resource('comment', \BalajiDharma\LaravelAdmin\Controllers\CommentController::class);
    Route::resource('thread', \BalajiDharma\LaravelAdmin\Controllers\ThreadController::class);
    Route::resource('attribute', \BalajiDharma\LaravelAdmin\Controllers\AttributeController::class);
    Route::resource('reaction', \BalajiDharma\LaravelAdmin\Controllers\ReactionController::class);
    Route::get('edit-account-info', [\BalajiDharma\LaravelAdmin\Controllers\UserController::class, 'accountInfo'])->name('account.info');
    Route::post('edit-account-info', [\BalajiDharma\LaravelAdmin\Controllers\UserController::class, 'accountInfoStore'])->name('account.info.store');
    Route::post('change-password', [\BalajiDharma\LaravelAdmin\Controllers\UserController::class, 'changePasswordStore'])->name('account.password.store');

    Route::resource('activitylog', \BalajiDharma\LaravelAdmin\Controllers\ActivityLogController::class)->except([
        'create',
        'store',
        'edit',
        'update',
    ]);

    //Demo
    Route::group([
        'prefix' => 'demo',
        'as' => 'demo.',
    ], function () {
        Route::resource('forms', \BalajiDharma\LaravelAdmin\Controllers\DemoFormsController::class)->except([
            'show',
            'edit',
            'update',
        ]);
    });
});
