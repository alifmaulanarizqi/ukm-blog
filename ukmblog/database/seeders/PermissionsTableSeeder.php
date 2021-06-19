<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'post_access',
            ],
            [
                'id'    => 2,
                'title' => 'user_access',
            ],
            [
                'id'    => 3,
                'title' => 'kategori_access',
            ],
            [
                'id'    => 4,
                'title' => 'setting_access',
            ],
            [
                'id'    => 5,
                'title' => 'ukm_access',
            ],
            [
                'id'    => 6,
                'title' => 'laporan_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
