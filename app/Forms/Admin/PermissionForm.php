<?php

namespace App\Forms\Admin;

use BalajiDharma\LaravelFormBuilder\Form;

class PermissionForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => __('Name'),
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
