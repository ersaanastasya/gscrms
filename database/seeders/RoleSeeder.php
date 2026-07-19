<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'Administrator',
                'description' => 'Full system access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Operator',
                'description' => 'Manage shipment and monitoring',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'description' => 'General application user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}