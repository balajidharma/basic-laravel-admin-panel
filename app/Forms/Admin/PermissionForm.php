<?php

namespace App\Forms\Admin;

use BalajiDharma\LaravelFormBuilder\Form;

class PermissionForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => 'Name',
        ]);

        $submitLabel = 'Create';

        if ($this->model) {
            $submitLabel = 'Update';
        }

        $this->add('submit', 'submit', [
            'label' => $submitLabel,
        ]);
    }
}
