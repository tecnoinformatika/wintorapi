<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'entidad-list',
            'entidad-create',
            'entidad-edit',
            'entidad-delete',
            'publicidad-list',
            'publicidad-create',
            'publicidad-edit',
            'publicidad-delete',
            'usuario-list',
            'usuario-create',
            'usuario-edit',
            'usuario-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
