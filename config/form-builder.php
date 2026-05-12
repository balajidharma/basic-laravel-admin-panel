<?php

return [
    'default' => 'default',
    'forms' => [
        'default' => [
            'wrapper_show' => true,
            'wrapper_class' => 'form-control py-2',
            'wrapper_error_class' => 'has-error',
            'label_class' => 'block font-medium text-sm text-base-700',
            'label_error_class' => 'text-red-400',
            'field_class' => 'input input-bordered w-full mt-2',
            'field_error_class' => 'border-red-400',
            'help_block_class' => 'help-block',
            'error_class' => 'text-sm text-red-400',
            'required_class' => 'required',
            'help_block_tag' => 'p',
            'submit' => [
                'wrapper_class' => 'flex justify-end mt-4',
                'field_class' => 'btn btn-primary px-6',
            ],
            'checkbox' => [
                'label_class' => 'label-text cursor-pointer',
                'field_class' => 'checkbox',
            ],
            'textarea' => [
                'field_class' => 'textarea input-bordered w-full mt-2',
            ],
        ],
    ],
];
