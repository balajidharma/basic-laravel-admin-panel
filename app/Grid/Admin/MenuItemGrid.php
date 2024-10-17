<?php

namespace App\Grid\Admin;

use App\Models\Role;
use BalajiDharma\LaravelCrud\CrudBuilder;
use BalajiDharma\LaravelMenu\Models\MenuItem;

class MenuItemGrid extends CrudBuilder
{
    public $title = 'MenuItems';

    public $description = 'Manage MenuItems';

    public $model = MenuItem::class;

    public $route = 'admin.menu.item';

    public function columns()
    {
        return [
            [
                'attribute' => 'name',
                'label' => __('Name'),
                'sortable' => true,
                'filter' => 'like',
                'searchable' => true,
            ],
            [
                'attribute' => 'uri',
                'label' => __('Link'),
                'form_options' => function ($model) {
                    return [
                        'help_block' => [
                            'text' => 'You can also enter an internal path such as /home or an external URL such as http://example.com. Add prefix <admin> to link for admin page. Enter <nolink> to display link text only.',
                        ],
                    ];
                },
            ],
            [
                'attribute' => 'description',
                'label' => __('Description'),
            ],
            [
                'attribute' => 'enabled',
                'label' => __('Enabled'),
                'type' => 'checkbox',
                'form_options' => function ($model) {
                    return [
                        'value' => 1,
                        'default_value' => 1,
                    ];
                },
            ],
            [
                'attribute' => 'parent_id',
                'label' => __('Parent Item'),
                'type' => 'choice',
                'form_options' => function ($model) {
                    $item_options = MenuItem::selectOptions($this->addtional['menu']->id, null, true);
                    return [
                        'choices' => $item_options,
                        'selected' => $this->model->parent_id ?? null,
                        'empty_value' => '-ROOT-',
                        'help_block' => [
                            'text' => 'The maximum depth for a link and all its children is fixed. Some menu links may not be available as parents if selecting them would exceed this limit.',
                        ],
                    ];
                },
            ],
            [
                'attribute' => 'weight',
                'label' => __('Weight'),
                'type' => 'number',
                'form_options' => function ($model) {
                    return [
                        'wrapper' => ['class' => 'form-control py-2 w-40'],
                    ];
                },
            ],
            [
                'attribute' => 'icon',
                'label' => __('Icon'),
                'type' => 'textarea',
                'form_options' => function ($model) {
                    return [
                        'attr' => [
                            'rows' => 3,
                            'class' => 'textarea input-bordered w-full',
                        ],
                    ];
                },
            ],
            [
                'attribute' => 'roles',
                'label' => __('Roles'),
                'fillable' => true,
                'type' => 'choice',
                'form_options' => function ($model) {
                    $roles = Role::all();
                    $itemHasRoles = [];
                    if ($model) {
                        $itemHasRoles = array_column(json_decode($model->roles, true), 'name');
                    }
                    return [
                        'choices' => $roles->pluck('name', 'name')->toArray(),
                        'choice_options' => [
                            'wrapper' => ['class' => 'col-span-4 sm:col-span-2 md:col-span-1'],
                        ],
                        'choices_wrapper' => ['class' => 'grid grid-cols-4 gap-4'],
                        'label_attr' => ['class' => 'inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight py-4 block sm:inline-block flex'],
                        'selected' => $itemHasRoles,
                        'expanded' => true,
                        'multiple' => true,
                    ];
                },
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

    public function buildRoutes($mainRoute = null)
    {
        if(!$mainRoute){
            $routeName = request()->route()->getName();
            $mainRoute = substr($routeName, 0, strrpos($routeName, '.'));
        }

        return [
            'index' => route($mainRoute.'.index', ['menu' => $this->addtional['menu']->id]),
            'create' => route($mainRoute.'.create', ['menu' => $this->addtional['menu']->id]),
            'store' => route($mainRoute.'.store', ['menu' => $this->addtional['menu']->id]),
            'edit' => function ($id) use ($mainRoute) {
                return route($mainRoute.'.edit', ['menu' => $this->addtional['menu']->id, 'item' => $id]);
            },
            'update' => function ($id) use ($mainRoute) {
                return route($mainRoute.'.update', ['menu' => $this->addtional['menu']->id, 'item' => $id]);
            },
            'show' => function ($id) use ($mainRoute) {
                return route($mainRoute.'.show', ['menu' => $this->addtional['menu']->id, 'item' => $id]);
            },
            'destroy' => function ($id) use ($mainRoute) {
                return route($mainRoute.'.destroy', ['menu' => $this->addtional['menu']->id, 'item' => $id]);
            },
        ];
    }
}