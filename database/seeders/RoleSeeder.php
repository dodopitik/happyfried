<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role_name' => 'admin', 'description' => 'Administrator '],
            ['role_name' => 'cashier', 'description' => 'cashier'],
            ['role_name' => 'chef', 'description' => 'chef'],
            ['role_name' => 'customer', 'description' => 'pelanggan'],
        ];

        DB::table('roles')->insert($roles);
    }
}
