<?php

namespace App\Models;

use BalajiDharma\LaravelMenu\Traits\LaravelCategories;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasRoles, LaravelCategories, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->setUsername();
        });
    }

    protected function usernameExists(string $username): bool
    {
        return self::where('username', $username)->exists();
    }

    public function setUsername(): void
    {
        // Early return if username is already set
        if ($this->username) {
            return;
        }

        $baseUsername = $this->generateBaseUsername();
        $this->username = $this->generateUniqueUsername($baseUsername);
    }

    private function generateBaseUsername(): string
    {
        return Str::of($this->name)
            ->ascii()
            ->lower()
            ->replaceMatches('/[\s._-]+/', '') // Replace multiple special characters at once
            ->trim();
    }

    private function generateUniqueUsername(string $baseUsername): string
    {
        $username = $baseUsername;

        // If base username is already unique, return it
        if (! $this->usernameExists($username)) {
            return $username;
        }

        // Generate a random suffix between 100000 and 999999
        $suffix = random_int(100000, 999999);
        $username = $baseUsername.$suffix;

        // In the unlikely case of collision, increment until unique
        while ($this->usernameExists($username)) {
            $suffix++;
            $username = $baseUsername.$suffix;
        }

        return $username;
    }
}
