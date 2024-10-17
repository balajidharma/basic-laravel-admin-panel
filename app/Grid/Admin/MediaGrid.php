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
                'fillable' => true,
                'label' => __('Type'),
                'type' => 'select',
                'value' => function ($model) {
                    return $model->variant_name;
                },
                'form_options' => function ($model) {
                    $type = media_type_as_options();
                    return [
                        'choices' => $type,
                        'default_value' => $model ? $model->variant_name : null,
                    ];
                },
            ],
            [
                'attribute' => 'filename',
                'fillable' => true,
                'label' => __('Name'),
                'sortable' => true,
                'filter' => 'like',
                'searchable' => true,
                'type' => 'text',
                'list' => [
                    'class' => 'BalajiDharma\LaravelCrud\Column\LinkColumn',
                    'route' => 'admin.media.show',
                    'route_params' => ['medium' => 'id'],
                    'attr' => ['class' => 'link link-primary']
                ],
                'form_options' => function ($model) {
                    return [
                        'attribute' => 'name',
                        'default_value' => $model ? $model->filename : null,
                    ];
                }
            ],
            [
                'attribute' => 'alt',
                'label' => __('Alternative Text'),
                'fillable' => true,
                'list' => false,
                'type' => 'text',
            ],
            [
                'attribute' => 'file',
                'label' => __('File'),
                'fillable' => true,
                'type' => 'file',
                'value' => function ($model) {
                    if($model->aggregate_type != 'image'){
                        $file = media_type_icon($model);
                    } else {
                        $file = '<image src="'.$model->getUrl().'" alt="'.$model->alt.'">';
                    }
                    return '<div class="avatar"><div class="w-32 rounded">'.$file.'</div><div>';
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
}