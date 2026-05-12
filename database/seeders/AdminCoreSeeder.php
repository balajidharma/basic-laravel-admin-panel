<?php

namespace Database\Seeders;

use BalajiDharma\LaravelCategory\Models\CategoryType;
use BalajiDharma\LaravelMenu\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminCoreSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'admin user',
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete',
            'menu list',
            'menu create',
            'menu edit',
            'menu delete',
            'menu.item list',
            'menu.item create',
            'menu.item edit',
            'menu.item delete',
            'category list',
            'category create',
            'category edit',
            'category delete',
            'category.type list',
            'category.type create',
            'category.type edit',
            'category.type delete',
            'media list',
            'media create',
            'media edit',
            'media delete',
            'comment list',
            'comment create',
            'comment edit',
            'comment delete',
            'thread list',
            'thread create',
            'thread edit',
            'thread delete',
            'activitylog list',
            'activitylog delete',
            'attribute list',
            'attribute create',
            'attribute edit',
            'attribute delete',
            'reaction list',
            'reaction create',
            'reaction edit',
            'reaction delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $role1 = Role::firstOrCreate(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $role2 = Role::firstOrCreate(['name' => 'admin']);
        foreach ($permissions as $permission) {
            $role2->givePermissionTo($permission);
        }

        // create roles and assign existing permissions
        $role3 = Role::firstOrCreate(['name' => 'writer']);
        $role3->givePermissionTo('admin user');
        foreach ($permissions as $permission) {
            if (Str::contains($permission, 'list')) {
                $role3->givePermissionTo($permission);
            }
        }

        // create demo users
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            array_merge(\App\Models\User::factory()->raw(), [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com'
            ])
        );
        $user->assignRole($role1);

        $user = \App\Models\User::firstOrCreate(
            ['email' => 'admin@example.com'],
            array_merge(\App\Models\User::factory()->raw(), [
                'name' => 'Admin User',
                'email' => 'admin@example.com'
            ])
        );
        $user->assignRole($role2);

        $user = \App\Models\User::firstOrCreate(
            ['email' => 'test@example.com'],
            array_merge(\App\Models\User::factory()->raw(), [
                'name' => 'Example User',
                'email' => 'test@example.com'
            ])
        );
        $user->assignRole($role3);

        // create menu
        $menu = Menu::firstOrCreate(
            ['machine_name' => 'admin'],
            [
                'name' => 'Admin',
                'description' => 'Admin Menu',
            ]
        );

        $menu_items = [
            [
                'name' => 'Dashboard',
                'uri' => '/<admin>',
                'enabled' => 1,
                'weight' => 0,
                'icon' => 'M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z',
            ],
            [
                'name' => 'Permissions',
                'uri' => '/<admin>/permission',
                'enabled' => 1,
                'weight' => 1,
                'icon' => 'M12,12H19C18.47,16.11 15.72,19.78 12,20.92V12H5V6.3L12,3.19M12,1L3,5V11C3,16.55 6.84,21.73 12,23C17.16,21.73 21,16.55 21,11V5L12,1Z',
            ],
            [
                'name' => 'Roles',
                'uri' => '/<admin>/role',
                'enabled' => 1,
                'weight' => 2,
                'icon' => 'M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z',
            ],
            [
                'name' => 'Users',
                'uri' => '/<admin>/user',
                'enabled' => 1,
                'weight' => 3,
                'icon' => 'M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z',
            ],
            [
                'name' => 'Menus',
                'uri' => '/<admin>/menu',
                'enabled' => 1,
                'weight' => 4,
                'icon' => 'M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z',
            ],
            [
                'name' => 'Categories',
                'uri' => '/<admin>/category/type',
                'enabled' => 1,
                'weight' => 4,
                'icon' => 'M5 3A2 2 0 0 0 3 5H5M7 3V5H9V3M11 3V5H13V3M15 3V5H17V3M19 3V5H21A2 2 0 0 0 19 3M3 7V9H5V7M7 7V11H11V7M13 7V11H17V7M19 7V9H21V7M3 11V13H5V11M19 11V13H21V11M7 13V17H11V13M13 13V17H17V13M3 15V17H5V15M19 15V17H21V15M3 19A2 2 0 0 0 5 21V19M7 19V21H9V19M11 19V21H13V19M15 19V21H17V19M19 19V21A2 2 0 0 0 21 19Z',
            ],
            [
                'name' => 'Media',
                'uri' => '/<admin>/media',
                'enabled' => 1,
                'weight' => 5,
                'icon' => 'M9 13V5C9 3.9 9.9 3 11 3H20C21.1 3 22 3.9 22 5V11H18.57L17.29 9.26C17.23 9.17 17.11 9.17 17.05 9.26L15.06 12C15 12.06 14.88 12.07 14.82 12L13.39 10.25C13.33 10.18 13.22 10.18 13.16 10.25L11.05 12.91C10.97 13 11.04 13.15 11.16 13.15H17.5V15H11C9.89 15 9 14.11 9 13M6 22V21H4V22H2V2H4V3H6V2H8.39C7.54 2.74 7 3.8 7 5V13C7 15.21 8.79 17 11 17H15.7C14.67 17.83 14 19.08 14 20.5C14 21.03 14.11 21.53 14.28 22H6M4 7H6V5H4V7M4 11H6V9H4V11M4 15H6V13H4V15M6 19V17H4V19H6M23 13V15H21V20.5C21 21.88 19.88 23 18.5 23S16 21.88 16 20.5 17.12 18 18.5 18C18.86 18 19.19 18.07 19.5 18.21V13H23Z',
            ],
            [
                'name' => 'Forum Threads',
                'uri' => '/<admin>/thread',
                'enabled' => 1,
                'weight' => 6,
                'icon' => 'M17,12V3A1,1 0 0,0 16,2H3A1,1 0 0,0 2,3V17L6,13H16A1,1 0 0,0 17,12M21,6H19V15H6V17A1,1 0 0,0 7,18H18L22,22V7A1,1 0 0,0 21,6Z',
            ],
            [
                'name' => 'Comments',
                'uri' => '/<admin>/comment',
                'enabled' => 1,
                'weight' => 7,
                'icon' => 'M12,23A1,1 0 0,1 11,22V19H7A2,2 0 0,1 5,17V7A2,2 0 0,1 7,5H21A2,2 0 0,1 23,7V17A2,2 0 0,1 21,19H16.9L13.2,22.71C13,22.89 12.76,23 12.5,23H12M13,17V20.08L16.08,17H21V7H7V17H13M3,15H1V3A2,2 0 0,1 3,1H19V3H3V15M9,9H19V11H9V9M9,13H17V15H9V13Z',
            ],
            [
                'name' => 'Activity Logs',
                'uri' => '/<admin>/activitylog',
                'enabled' => 1,
                'weight' => 8,
                'icon' => 'M5.314 1.256a.75.75 0 01-.07 1.058L3.889 3.5l1.355 1.186a.75.75 0 11-.988 1.128l-2-1.75a.75.75 0 010-1.128l2-1.75a.75.75 0 011.058.07zM7.186 1.256a.75.75 0 00.07 1.058L8.611 3.5 7.256 4.686a.75.75 0 10.988 1.128l2-1.75a.75.75 0 000-1.128l-2-1.75a.75.75 0 00-1.058.07zM2.75 7.5a.75.75 0 000 1.5h10.5a.75.75 0 000-1.5H2.75zM2 11.25a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zM2.75 13.5a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5z',
            ],
            [
                'name' => 'Attributes',
                'uri' => '/<admin>/attribute',
                'enabled' => 1,
                'weight' => 9,
                'icon' => 'M21 18v1c0 1.1-.9 2-2 2H5c-1.11 0-2-.9-2-2V5c0-1.1.89-2 2-2h14c1.1 0 2 .9 2 2v1h-9c-1.11 0-2 .9-2 2v8c0 1.1.89 2 2 2h9zm-9-2h10V8H12v8zm4-2.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z',
            ],
            [
                'name' => 'Reactions',
                'uri' => '/<admin>/reaction',
                'enabled' => 1,
                'weight' => 10,
                'icon' => 'M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-1.91l-.01-.01L23 10z',
            ],
        ];

        foreach ($menu_items as $item) {
            $menu->menuItems()->updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }

        $category_types = [
            [
                'name' => 'Category',
                'machine_name' => 'category',
                'description' => 'Main Category',
            ],
            [
                'name' => 'Tag',
                'machine_name' => 'tag',
                'description' => 'Site Tags',
                'is_flat' => true,
            ],
            [
                'name' => 'Admin Tag',
                'machine_name' => 'admin_tag',
                'description' => 'Admin Tags',
                'is_flat' => true,
            ],
            [
                'name' => 'Forum Category',
                'machine_name' => 'forum_category',
                'description' => 'Forum Category',
            ],
            [
                'name' => 'Forum Tag',
                'machine_name' => 'forum_tag',
                'description' => 'Forum Tags',
                'is_flat' => true,
            ]
        ];

        foreach ($category_types as $category_type) {
            CategoryType::updateOrCreate(
                ['machine_name' => $category_type['machine_name']],
                $category_type
            );
        }

        $forumCategoryType = CategoryType::firstWhere(['machine_name' => 'forum_category']);

        $forumCategoryType->categories()->updateOrCreate(
            ['name' => 'General'],
            [
                'description' => 'General Forum Category',
                'name' => 'General'
            ]
        );
    }
}
