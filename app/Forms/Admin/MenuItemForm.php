<?php

namespace App\Forms\Admin;

use App\Models\Role;
use BalajiDharma\LaravelFormBuilder\Form;
use BalajiDharma\LaravelMenu\Models\MenuItem;

class MenuItemForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $roles = Role::all();
        $itemHasRoles = [];
        if ($this->model) {
            $itemHasRoles = array_column(json_decode($this->model->roles, true), 'name');
        }

        $item_options = MenuItem::selectOptions($this->data['menu']->id, null, true);

        $this->add('name', 'text', [
            'label' => __('Name'),
        ]);

        $this->add('uri', 'text', [
            'label' => __('Link'),
            'help_block' => [
                'text' => 'You can also enter an internal path such as /home or an external URL such as http://example.com. Add prefix <admin> to link for admin page. Enter <nolink> to display link text only.',
            ],
        ]);

        $this->add('description', 'text', [
            'label' => __('Description'),
        ]);

        $this->add('enabled', 'checkbox', [
            'label' => __('Enabled'),
            'value' => 1,
            'default_value' => 1,
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
            'wrapper' => ['class' => 'form-control py-2 w-40'],
            'label' => __('Weight'),
        ]);

        $this->add('icon', 'textarea', [
            'label' => __('Icon'),
            'attr' => [
                'rows' => 3,
                'class' => 'textarea input-bordered w-full',
            ],
        ]);

        $this->add('roles', 'choice', [
            'choices' => $roles->pluck('name', 'name')->toArray(),
            'choice_options' => [
                'wrapper' => ['class' => 'col-span-4 sm:col-span-2 md:col-span-1'],
            ],
            'choices_wrapper' => ['class' => 'grid grid-cols-4 gap-4'],
            'label' => __('Roles'),
            'label_attr' => ['class' => 'inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight py-4 block sm:inline-block flex'],
            'selected' => $itemHasRoles,
            'expanded' => true,
            'multiple' => true,
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
