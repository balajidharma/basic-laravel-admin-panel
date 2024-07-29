<?php

namespace App\Forms\Admin;

use BalajiDharma\LaravelFormBuilder\Form;

class CategoryTypeForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => __('Name'),
        ]);

        $this->add('machine_name', 'text', [
            'label' => __('Machine-readable name'),
            'attr' => $this->model ? ['disabled' => 'disabled'] : [],
        ]);

        $this->add('description', 'text', [
            'label' => __('Description'),
        ]);

        $this->add('is_flat', 'checkbox', [
            'label' => __('Use Flat Category'),
            'value' => 1,
            'checked' => $this->model ? $this->model->is_flat : false,
            'attr' => [
                'class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
            ],
        ]);

        $submitLabel = __('Create');

        if ($this->model) {
            $submitLabel = __('Update');
        }

        $this->add('submit', 'submit', [
            'label' => $submitLabel,
        ]);
    }
}
