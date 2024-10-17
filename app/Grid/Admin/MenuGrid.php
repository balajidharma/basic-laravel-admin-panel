<?php

namespace App\Grid\Admin;

use BalajiDharma\LaravelCrud\CrudBuilder;
use BalajiDharma\LaravelMenu\Models\Menu;

class MenuGrid extends CrudBuilder
{
    public $title = 'Menus';

    public $description = 'Manage Menus';

    public $model = Menu::class;

    public $route = 'admin.menu';

    public function columns()
    {
        return [
            [
                'attribute' => 'id',
                'label' => __('ID'),
                'sortable' => true,
                'searchable' => true,
                'form_options' => function($model) {
                    return [
                        'hide' => true
                    ];
                }
            ],
            [
                'attribute' => 'name',
                'label' => __('Name'),
                'sortable' => true,
                'filter' => 'like',
                'searchable' => true,
            ],
            [
                'attribute' => 'machine_name',
                'label' => __('Machine name'),
                'sortable' => true,
                'filter' => 'like',
                'searchable' => true,
                'form_options' => function($model) {
                    return [
                        'label' => __('Machine-readable name'),
                        'attr' => $model->machine_name ? ['disabled' => 'disabled'] : [],
                    ];
                }
            ],
            [
                'attribute' => 'description',
                'label' => __('Description'),
                'list' => false
            ],
            [
                'attribute' => 'items',
                'label' => __('# of Items'),
                'list' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\LinkColumn',
                    'route' => 'admin.menu.item.index',
                    'route_params' => ['menu' => 'id'],
                    'attr' => ['class' => 'link link-primary'],
                    'value' => function ($model) {
                        return count($model->menuItems);
                    },
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