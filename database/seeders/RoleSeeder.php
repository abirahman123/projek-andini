<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'pengadilan-agama',
        ]);
        Role::create([
            'name' => 'asesor',
        ]);
        Role::create([
            'name' => 'catin',
        ]);
    }
}
