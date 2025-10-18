<?php

return [
    'models' => [
        'category_type' => BalajiDharma\LaravelCategory\Models\CategoryType::class,
        'category' => BalajiDharma\LaravelCategory\Models\Category::class,
    ],

    'table_names' => [
        'category_types' => 'category_types',
        'categories' => 'categories',
        'model_has_categories' => 'model_has_categories',
    ],

    'column_names' => [
        'model_morph_key' => 'model_id',
    ],
];
