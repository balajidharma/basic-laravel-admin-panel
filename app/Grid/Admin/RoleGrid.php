<?php

namespace App\Grid\Admin;

use BalajiDharma\LaravelCrud\CrudBuilder;
use App\Models\Role;
use App\Models\Permission;

class RoleGrid extends CrudBuilder
{
    public $title = 'Roles';

    public $description = 'Manage Roles';

    public $model = Role::class;

    public $route = 'admin.role';

    public function columns()
    {
        return [
            [
                'attribute' => 'id',
                'label' => __('ID'),
                'sortable' => true,
                'searchable' => true,
                'list' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\LinkColumn',
                    'route' => 'admin.role.show',
                    'route_params' => ['role' => 'id'],
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
                    'route' => 'admin.role.show',
                    'route_params' => ['role' => 'id'],
                    'attr' => ['class' => 'link link-primary']
                ]
            ],
            [
                'attribute' => 'permissions',
                'label' => __('Permissions'),
                'type' => 'choice',
                'fillable' => true,
                'list' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\ListColumn',
                    'attribute' => 'name'
                ],
                'show' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\ListColumn',
                    'attribute' => 'name'
                ],
                'form_options' => function($model) {
                    $hideField = false;
                    if (! $model || $model->name !== config('admin.super_admin', 'super-admin')) {
                        $permissions = Permission::all();
                    } else {
                        $permissions = collect();
                        $hideField = true;
                    }
                    $roleHasPermissions = [];
                    if ($model) {
                        $roleHasPermissions = array_column(json_decode($model->permissions, true), 'name');
                    }
                    return [
                        'choices' => $permissions->pluck('name', 'name')->toArray(),
                        'choice_options' => [
                            'wrapper' => ['class' => 'col-span-4 sm:col-span-2 md:col-span-1'],
                        ],
                        'choices_wrapper' => ['class' => 'grid grid-cols-4 gap-4'],
                        'label_attr' => ['class' => 'inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight py-4 block sm:inline-block flex'],
                        'selected' => $roleHasPermissions,
                        'expanded' => true,
                        'multiple' => true,
                        'hide' => $hideField
                    ];
                }
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