<?php


// Home
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


Breadcrumbs::for("home", function ($trail) {
    $trail->push('Dashboard');
});


Breadcrumbs::macro('resource', function ($name, $title)  {

    // Home > Blog
    Breadcrumbs::for("$name.index", function ($trail) use ($name, $title) {
        $trail->push($title, route("$name.index"));
    });

    // Home > Blog > New
    Breadcrumbs::for("$name.create", function ($trail) use ($name) {
        $trail->parent("$name.index");
        $trail->push('New', route("$name.create"));
    });

    // Home > Blog > Post 123
    Breadcrumbs::for("$name.show", function ($trail, $model) use ($name) {
        $trail->parent("$name.index");
        $trail->push($model->name, route("$name.show", "$model->id"));
    });

    // Home > Blog > Post 123 > Edit

    Breadcrumbs::for("$name.edit", function ($trail, $model) use ($name) {

        $trail->parent("$name.show", $model);
        $trail->push('Edit', route("$name.edit", $model->id));
    });
});

Breadcrumbs::resource('permission', 'Permissions');
Breadcrumbs::resource('role', 'Roles');
Breadcrumbs::resource('user', 'Users');
