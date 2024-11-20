<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'description' => 'Administrator Sistem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mahasiswa',
                'description' => 'User Mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}