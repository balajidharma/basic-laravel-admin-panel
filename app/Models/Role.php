<?php

namespace App\Models;

use BalajiDharma\LaravelMenu\Traits\LaravelCategories;
use Spatie\Permission\Models\Role as OriginalRole;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends OriginalRole
{
    use LaravelCategories, LogsActivity;

    protected $fillable = [
        'name',
        'guard_name',
        'updated_at',
        'created_at',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'guard_name'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => "Role has been {$eventName}");
    }
}
