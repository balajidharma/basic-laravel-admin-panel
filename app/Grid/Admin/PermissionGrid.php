<?php

namespace App\Grid\Admin;

use BalajiDharma\LaravelCrud\CrudBuilder;
use App\Models\Permission;

class PermissionGrid extends CrudBuilder
{
    public $title = 'Permissions';

    public $description = 'Manage Permissions';

    public $model = Permission::class;

    public $route = 'admin.permission';

    public function columns()
    {
        return [
            [
                'label' => __('#'),
                'attribute' => 'label',
                'list' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\SerialColumn',
                ],
                'show' => false
            ],
            [
                'attribute' => 'id',
                'label' => __('ID'),
                'sortable' => true,
                'searchable' => true,
                'list' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\LinkColumn',
                    'route' => 'admin.permission.show',
                    'route_params' => ['permission' => 'id'],
                    'attr' => ['class' => 'link link-primary']
                ]
            ],
            [
                'attribute' => 'name',
                'label' => __('Name'),
                'sortable' => true,
                'filter' => 'like',
                'searchable' => true,
                'list' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\LinkColumn',
                    'route' => 'admin.permission.show',
                    'route_params' => ['permission' => 'id'],
                    'attr' => ['class' => 'link link-primary']
                ]
            ],
            [
                'attribute' => 'created_at',
                'sortable' => true
            ],
            [
                'attribute' => 'updated_at',
                'sortable' => true
            ]
        ];
    }
}