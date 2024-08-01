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
                'rules' => 'required',
            ])
            ->add('password', 'password', [
                'label' => 'Password',
                'rules' => 'required',
            ])
            ->add('remember', 'checkbox', [
                'label' => 'Remember Me',
                'value' => 1,
            ])
            ->add('submit', 'submit', [
                'label' => 'Login',
            ]);
    }
}
