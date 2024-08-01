<?php

namespace App\Forms\Admin;

use App\Models\Role;
use BalajiDharma\LaravelFormBuilder\Form;

class UserForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $roles = Role::all();
        $userHasRoles = [];

        if ($this->model) {
            $userHasRoles = array_column(json_decode($this->model->roles, true), 'name');
        }

        $this->add('name', 'text', [
            'label' => __('Name'),
        ]);

        $this->add('email', 'email', [
            'label' => __('Email'),
        ]);

        $this->add('password', 'password', [
            'label' => __('Password'),
            'value' => '',
        ]);

        $this->add('password_confirmation', 'password', [
            'label' => __('Password Confirmation'),
        ]);

        $this->add('roles', 'choice', [
            'choices' => $roles->pluck('name', 'name')->toArray(),
            'choice_options' => [
                'wrapper' => ['class' => 'col-span-4 sm:col-span-2 md:col-span-1'],
            ],
            'choices_wrapper' => ['class' => 'grid grid-cols-4 gap-4'],
            'label' => __('Roles'),
            'label_attr' => ['class' => 'inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight py-4 block sm:inline-block flex'],
            'selected' => $userHasRoles,
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
