<?php

namespace App\Grid\Admin;

use BalajiDharma\LaravelCrud\CrudBuilder;
use App\Models\Role;
use App\Models\User;

class UserGrid extends CrudBuilder
{
    public $title = 'Users';

    public $description = 'Manage Users';

    public $model = User::class;

    public $route = 'admin.user';

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
                    'route' => 'admin.user.show',
                    'route_params' => ['user' => 'id'],
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
                    'route' => 'admin.user.show',
                    'route_params' => ['user' => 'id'],
                    'attr' => ['class' => 'link link-primary']
                ]
            ],
            [
                'attribute' => 'email',
                'label' => __('Email'),
                'sortable' => true,
                'searchable' => true,
            ],
            [
                'attribute' => 'password',
                'label' =>  __('Password'),
                'list' => false,
                'show' => false,
                'type' => 'password',
                'fillable' => true,
                'form_options' => function($model) {
                    return [
                        'value' => '',
                    ];
                },
            ],
            [
                'attribute' => 'password_confirmation',
                'label' => __('Password Confirmation'),
                'fillable' => true,
                'list' => false,
                'show' => false,
                'type' => 'password',
            ],
            [
                'attribute' => 'roles',
                'label' => __('Roles'),
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
                    $roles = Role::all();
                    $userHasRoles = [];
                    if ($model) {
                        $userHasRoles = array_column(json_decode($model->roles, true), 'name');
                    }
                    return [
                        'choices' => $roles->pluck('name', 'name')->toArray(),
                        'choice_options' => [
                            'wrapper' => ['class' => 'col-span-4 sm:col-span-2 md:col-span-1'],
                        ],
                        'choices_wrapper' => ['class' => 'grid grid-cols-4 gap-4'],
                        'label_attr' => ['class' => 'inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight py-4 block sm:inline-block flex'],
                        'selected' => $userHasRoles,
                        'expanded' => true,
                        'multiple' => true,
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