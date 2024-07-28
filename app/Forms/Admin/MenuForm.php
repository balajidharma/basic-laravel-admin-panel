<?php

namespace App\Forms\Admin;

use BalajiDharma\LaravelFormBuilder\Form;

class MenuForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => 'Name',
        ]);

        $this->add('machine_name', 'text', [
            'label' => 'Machine-readable name',
            'attr' => $this->model ? ['disabled' => 'disabled'] : [],
        ]);

        $this->add('description', 'text', [
            'label' => 'Description',
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
