<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        // untuk developer
        Role::find(1)->permissions()->attach(5);

        // untuk ketua
        Role::find(2)->permissions()->attach([1, 2, 3, 4, 6]);

        // untuk admin
        Role::find(3)->permissions()->attach([1, 3, 4, 6]);
    }
}
