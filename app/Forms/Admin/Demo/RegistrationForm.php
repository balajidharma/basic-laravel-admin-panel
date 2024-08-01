<?php

namespace App\Forms\Admin\Demo;

use BalajiDharma\LaravelFormBuilder\Form;

class RegistrationForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Name',
                'rules' => 'required',
            ])
            ->add('email', 'email', [
                'label' => 'Email',
                'rules' => 'required|email|unique:users,email',
            ])
            ->add('password', 'password', [
                'label' => 'Password',
                'rules' => 'required|min:6',
            ])
            ->add('password_confirmation', 'password', [
                'label' => 'Confirm Password',
                'rules' => 'required|same:password',
            ])
            ->add('submit', 'submit', [
                'label' => 'Register',
            ]);
    }
}
