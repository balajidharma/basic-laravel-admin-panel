<?php

namespace App\Grid\Admin;

use BalajiDharma\LaravelCrud\CrudBuilder;
use BalajiDharma\LaravelCategory\Models\CategoryType;

class CategoryTypeGrid extends CrudBuilder
{
    public $title = 'Category Types';

    public $description = 'Manage Category Types';

    public $model = CategoryType::class;

    public $route = 'admin.category.type';

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
                    'route' => 'admin.category.type.item.index',
                    'route_params' => ['type' => 'id'],
                    'attr' => ['class' => 'link link-primary'],
                    'value' => function ($model) {
                        return count($model->categories);
                    },
                ]
            ],
            [
                'attribute' => 'is_flat',
                'label' => __('Use Flat Category'),
                'sortable' => true,
                'searchable' => true,
                'type' => 'checkbox',
                'value' => function($model) {
                    return $model->is_flat ? __('Yes') : __('No');
                },
                'form_options' => function($model) {
                    return [
                        'value' => 1,
                        'checked' => $model ? $model->is_flat : false,
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