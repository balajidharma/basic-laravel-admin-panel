<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Route;

// admin dashboard
Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::macro('resource', function (string $name, string $title, string $modelCloumn = 'name', ?string $parentName = null) {
    if ($parentName) {
        Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail, $model) use ($name, $title, $parentName) {
            $trail->parent("{$parentName}.show", $model);
            $trail->push($title, route("{$name}.index", $model));
        });

        Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail, $model) use ($name) {
            $trail->parent("{$name}.index", $model);
            $trail->push('Create', route("{$name}.create", $model));
        });

        Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, $model, $item) use ($name, $modelCloumn) {
            $trail->parent("{$name}.index", $model, $item);
            \Log::info("{$name}.show");
            if (Route::has("{$name}.show")) {
                $trail->push($item->{$modelCloumn} ?? $model, route("{$name}.show", [$model, $item]));
            } else {
                $trail->push($item->{$modelCloumn} ?? $model);
            }
        });

        Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, $model, $item) use ($name) {
            $trail->parent("{$name}.show", $model, $item);
            $trail->push('Edit', route("{$name}.edit", [$model, $item]));
        });

    } else {
        Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($name, $title) {
            $trail->parent('admin.dashboard');
            $trail->push($title, route("{$name}.index"));
        });

        Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name) {
            $trail->parent("{$name}.index");
            $trail->push('Create', route("{$name}.create"));
        });

        Breadcrumbs::for("{$name}.show", function (BreadcrumbTrail $trail, $model) use ($name, $modelCloumn) {
            $trail->parent("{$name}.index");
            if (Route::has("$name.show")) {
                $trail->push($model->{$modelCloumn} ?? $model, route("{$name}.show", $model));
            } else {
                $trail->push($model->{$modelCloumn} ?? $model);
            }
        });

        Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, $model) use ($name) {
            $trail->parent("{$name}.show", $model);
            $trail->push('Edit', route("{$name}.edit", $model));
        });
    }
});

Breadcrumbs::resource('admin.permission', 'Permissions');
Breadcrumbs::resource('admin.role', 'Roles');
Breadcrumbs::resource('admin.user', 'Users');
Breadcrumbs::resource('admin.media', 'Media');
Breadcrumbs::resource('admin.menu', 'Menu');
Breadcrumbs::resource('admin.menu.item', 'Menu Items', 'name', 'admin.menu');
Breadcrumbs::resource('admin.category.type', 'Category Types');
Breadcrumbs::resource('admin.category.type.item', 'Items', 'name', 'admin.category.type');
Breadcrumbs::resource('admin.comment', 'Comments', 'id');
Breadcrumbs::resource('admin.thread', 'Threads', 'title');
Breadcrumbs::resource('admin.activitylog', 'Activity Logs', 'id');
Breadcrumbs::resource('admin.attribute', 'Attributes', 'name');
Breadcrumbs::resource('admin.reaction', 'Reactions', 'id');

Breadcrumbs::resource('admin.demo.forms', 'Froms');
