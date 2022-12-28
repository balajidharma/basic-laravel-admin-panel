<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    public function handle($data): User
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        $roles = $data->roles ?? [];
        $user->assignRole($roles);

        return $user;
    }
}
