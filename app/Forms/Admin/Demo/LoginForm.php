<?php

namespace App\Forms\Admin\Demo;

use BalajiDharma\LaravelFormBuilder\Form;

class LoginForm extends Form
{
    public function buildForm()
    {
        $this
        ->add('username', 'text', [
            'label' => 'Username',
            'rules' => 'required'
        ])
        ->add('password', 'password', [
            'label' => 'Password',
            'rules' => 'required'
        ])
        ->add('remember', 'checkbox', [
            'label' => 'Remember Me',
            'value' => 1,
            'attr' => [
                'class' => 'rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
            ],
        ])
        ->add('submit', 'submit', [
            'label' => 'Login',
        ]);
    }
}
