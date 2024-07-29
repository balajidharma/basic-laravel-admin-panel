<?php

namespace App\Forms\Admin;

use BalajiDharma\LaravelCategory\Models\Category;
use BalajiDharma\LaravelFormBuilder\Form;

class CategoryItemForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $item_options = Category::selectOptions($this->data['type']->id, null, true);

        $this->add('name', 'text', [
            'label' => __('Name'),
        ]);

        $this->add('slug', 'text', [
            'label' => __('Slug'),
            'help_block' => [
                'text' => 'The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.',
            ],
        ]);

        $this->add('description', 'text', [
            'label' => __('Description'),
        ]);

        $this->add('enabled', 'checkbox', [
            'label' => __('Enabled'),
            'value' => 1,
            'default_value' => 1,
            'attr' => [
                'class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
            ],
        ]);

        $this->add('parent_id', 'select', [
            'choices' => $item_options,
            'label' => __('Parent Item'),
            'selected' => $this->model->parent_id ?? null,
            'empty_value' => '-ROOT-',
            'help_block' => [
                'text' => 'The maximum depth for a link and all its children is fixed. Some menu links may not be available as parents if selecting them would exceed this limit.',
            ],
        ]);

        $this->add('weight', 'number', [
            'wrapper' => ['class' => 'form-group py-2 w-40'],
            'label' => __('Weight'),
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
