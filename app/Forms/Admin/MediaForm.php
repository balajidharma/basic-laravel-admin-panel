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
            'label' => __('Type'),
            'default_value' => $this->model ? $this->model->variant_name : null,
        ]);

        $this->add('name', 'text', [
            'label' => __('Name'),
            'default_value' => $this->model ? $this->model->filename : null,
        ]);

        $this->add('alt', 'text', [
            'label' => __('Alternative Text'),
        ]);

        $this->add('file', 'file', [
            'label' => __('File'),
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
