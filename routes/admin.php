<?php

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::get('edit-account-info', 'UserController@accountInfo')->name('admin.account.info');
    Route::post('edit-account-info', 'UserController@accountInfoStore')->name('admin.account.info.store');
    Route::post('change-password', 'UserController@changePasswordStore')->name('admin.account.password.store');
});


Route::group([
    'namespace' => 'App\Http\Controllers\Ecom',
    'prefix' => 'admin',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::resource('products', 'ProductsController');
    Route::resource('category-products', 'CategoryProductsController', [
        'names' => [
            'index' => 'categoryProducts.index',
            'store' => 'categoryProducts.store',
            'update' => 'categoryProducts.update',
            'create' => 'categoryProducts.create',
            'edit' => 'categoryProducts.edit',
            'destroy' => 'categoryProducts.destroy',
            'show' => 'categoryProducts.show',
        ]
    ]);
});
