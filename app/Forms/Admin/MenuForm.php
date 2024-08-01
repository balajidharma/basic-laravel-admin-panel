<?php

namespace App\Forms\Admin;

use BalajiDharma\LaravelFormBuilder\Form;

class MenuForm extends Form
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

        $submitLabel = __('Create');

        if ($this->model) {
            $submitLabel = __('Update');
        }

        $this->add('submit', 'submit', [
            'label' => $submitLabel,
        ]);
    }
}
