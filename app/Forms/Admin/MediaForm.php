<?php

namespace App\Forms\Admin;

use BalajiDharma\LaravelFormBuilder\Form;

class MediaForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $type = media_type_as_options();

        $this->add('type', 'select', [
            'choices' => $type,
            'label' => 'Type',
            'default_value' => $this->model ? $this->model->variant_name : null,
        ]);

        $this->add('name', 'text', [
            'label' => 'Name',
            'default_value' => $this->model ? $this->model->filename : null,
        ]);

        $this->add('alt', 'text', [
            'label' => 'Alternative Text',
        ]);

        $this->add('file', 'file', [
            'label' => 'File',
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
