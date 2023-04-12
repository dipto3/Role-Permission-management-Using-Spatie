<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        // $roleAdmin = Role::create(['name' => 'admin']);
        // $roleEditor = Role::create(['name' => 'editor']);
        // $roleUser = Role::create(['name' => 'user']);

        $permissionsuper = [


            [
                'group_name' => 'blog',
                'permissions' => [
                    // Blog Permissions
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',

                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    // user Permissions
                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete',

                ]
            ],

            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',

                ]
            ],

        ];




        for ($i = 0; $i < count($permissionsuper); $i++) {
            $permissionGroup = $permissionsuper[$i]['group_name'];
            for ($j = 0; $j < count($permissionsuper[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissionsuper[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
