<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'kourosh@yahoo.com',
            'password' => bcrypt('admin'),
            'phone_number' => '09198251858'
        ]);
        $admin->assignRole(Role::query()->first());
    }
}
