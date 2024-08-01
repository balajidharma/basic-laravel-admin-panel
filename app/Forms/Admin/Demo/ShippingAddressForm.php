<?php

namespace App\Forms\Admin\Demo;

use BalajiDharma\LaravelFormBuilder\Form;

class ShippingAddressForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('firstname', 'text', [
                'label' => 'First name',
                'rules' => 'required',
            ])
            ->add('lastname', 'text', [
                'label' => 'Last name',
                'rules' => 'required',
            ])
            ->add('address', 'text', [
                'label' => 'Address',
                'rules' => 'required',
            ])
            ->add('address2', 'text', [
                'label' => 'Apartment, suite, etc. (optional)',
            ])
            ->add('city', 'text', [
                'label' => 'City',
                'rules' => 'required',
            ])
            ->add('state', 'text', [
                'label' => 'State',
                'rules' => 'required',
            ])
            ->add('country', 'text', [
                'label' => 'Country',
                'rules' => 'required',
            ])
            ->add('zip', 'text', [
                'label' => 'Zip',
                'rules' => 'required',
            ])
            ->add('phone', 'text', [
                'label' => 'Phone',
                'rules' => 'required',
            ])
            ->add('submit', 'submit', [
                'label' => 'submit',
            ]);
    }
}
