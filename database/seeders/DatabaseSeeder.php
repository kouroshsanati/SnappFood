<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
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
        FoodCategory::query()->create([
           'name'=> 'hamberger'
        ]);
        FoodCategory::query()->create([
            'name'=> 'salad'
        ]);
        RestaurantCategory::query()->create([
            'name'=>'fast food'
        ]);
        RestaurantCategory::query()->create([
            'name'=>'fast food 2'
        ]);
    }
}
