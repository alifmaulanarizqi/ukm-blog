<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Dev',
            ],
            [
                'id'    => 2,
                'title' => 'Ketua',
            ],
            [
                'id'    => 3,
                'title' => 'Admin',
            ],
            [
                'id'    => 4,
                'title' => 'Anggota',
            ],
        ];

        Role::insert($roles);
    }
}
