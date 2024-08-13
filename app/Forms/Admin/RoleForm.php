<?php

namespace App\Forms\Admin;

use App\Models\Permission;
use BalajiDharma\LaravelFormBuilder\Form;

class RoleForm extends Form
{
    protected $showFieldErrors = false;

    public function buildForm()
    {
        $permissions = Permission::all();
        $roleHasPermissions = [];
        if ($this->model) {
            $roleHasPermissions = array_column(json_decode($this->model->permissions, true), 'name');
        }

        $this->add('name', 'text', [
            'label' => __('Name'),
        ]);

        if (! $this->model || $this->model->name !== config('admin.super_admin', 'super-admin')) {
            $this->add('permissions', 'choice', [
                'choices' => $permissions->pluck('name', 'name')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'col-span-4 sm:col-span-2 md:col-span-1'],
                ],
                'choices_wrapper' => ['class' => 'grid grid-cols-4 gap-4'],
                'label' => __('Permissions'),
                'label_attr' => ['class' => 'inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight py-4 block sm:inline-block flex'],
                'selected' => $roleHasPermissions,
                'expanded' => true,
                'multiple' => true,
            ]);
        }

        $submitLabel = __('Create');

        if ($this->model) {
            $submitLabel = __('Update');
        }

        $this->add('submit', 'submit', [
            'label' => $submitLabel,
        ]);
    }
}
