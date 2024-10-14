<?php

namespace App\Grid\Admin;

use BalajiDharma\LaravelCrud\CrudBuilder;
use Plank\Mediable\Media;

class MediaGrid extends CrudBuilder
{
    public $title = 'Media';

    public $description = 'Manage Media';

    public $model = Media::class;

    public $route = 'admin.media';

    public function columns()
    {
        return [
            [
                'attribute' => 'type',
                'filable' => true,
                'label' => __('Type'),
                'value' => function ($model) {
                    return $model->variant_name;
                },
                'form_options' => function ($model) {
                    $type = media_type_as_options();
                    return [
                        'type' => 'select',
                        'choices' => $type,
                        'label' => __('Type'),
                        'default_value' => $model ? $model->variant_name : null,
                    ];
                },
            ],
            [
                'attribute' => 'filename',
                'filable' => true,
                'label' => 'Name',
                'sortable' => true,
                'filter' => 'like',
                'searchable' => true,
                'list' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\LinkColumn',
                    'route' => 'admin.media.show',
                    'route_params' => ['medium' => 'id'],
                    'attr' => ['class' => 'link link-primary']
                ],
                'form_options' => function ($model) {
                    return [
                        'attribute' => 'name',
                        'type' => 'text',
                        'label' => __('Name'),
                        'default_value' => $model ? $model->filename : null,
                    ];
                }
            ],
            [
                'attribute' => 'alt',
                'label' => __('Alternative Text'),
                'filable' => true,
                'list' => false,
                'form_options' => function ($model) {
                    return [
                        'type' => 'text',
                        'label' => __('Alternative Text'),
                    ];
                }
            ],
            [
                'attribute' => 'file',
                'label' => __('File'),
                'filable' => true,
                'value' => function ($model) {
                    if($model->aggregate_type != 'image'){
                        $file = media_type_icon($model);
                    } else {
                        $file = '<image src="'.$model->getUrl().'" alt="'.$model->alt.'">';
                    }
                    return '<div class="avatar"><div class="w-32 rounded">'.$file.'</div><div>';
                },
                'form_options' => function ($model) {
                    return [
                        'type' => 'file',
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