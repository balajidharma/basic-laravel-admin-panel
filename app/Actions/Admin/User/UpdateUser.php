<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUser
{
    public function handle($data, User $user): User
    {
        $user->update([
            'name' => $data->name,
            'email' => $data->email,
        ]);

        if ($data->password) {
            $user->update([
                'password' => Hash::make($data->password),
            ]);
        }

        $roles = $data->roles ?? [];
        $user->syncRoles($roles);

        return $user;
    }
}
