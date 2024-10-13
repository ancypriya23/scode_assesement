<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'user'];

        foreach ($roles as $role) {
          Role::factory()->create(['name' => $role]);
        }

        $userRole = Role::first();
        User::whereNull('role_id')->update(['role_id' => $userRole->id]);

    }
}
