<?php

return [
    'models' => [
        'attributes' => BalajiDharma\LaravelAttributes\Models\Attribute::class,
    ],

    'table_names' => [
        'attributes' => 'attributes',
    ],

    'validate_value_before_save' => true,

    'data_types' => [
        ['name' => 'string', 'validation' => 'string', 'cast' => 'string'],
        ['name' => 'integer', 'validation' => 'integer', 'cast' => 'integer'],
        ['name' => 'float', 'validation' => 'numeric', 'cast' => 'float'],
        ['name' => 'boolean', 'validation' => 'boolean', 'cast' => 'boolean'],
        ['name' => 'date', 'validation' => 'date', 'cast' => 'date'],
        ['name' => 'json', 'validation' => 'json', 'cast' => 'array'],
    ],
];
