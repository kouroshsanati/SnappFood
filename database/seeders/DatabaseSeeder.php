<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FoodCategory;
use App\Models\Restaurant;
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
        $user = User::create([
            'name' => 'ali',
            'email' => 'ali@yahoo.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '09875454454'
        ]);
        $admin->assignRole(Role::query()->first());
        FoodCategory::query()->create([
            'name' => 'hamberger'
        ]);
        $user->assignRole(Role::findByName('restaurant_manager'));
        FoodCategory::query()->create([
            'name' => 'salad'
        ]);
        $cat1 = RestaurantCategory::query()->create([
            'name' => 'fast food'
        ]);
        $cat2 = RestaurantCategory::query()->create([
            'name' => 'daryaee'
        ]);
        Restaurant::query()->create([
            'user_id' => $user->id,
            'restaurant_category_id' => $cat1->id,
            'address' => 'this is address',
            'name' => 'something',
            'telephone' => '09127658484',
            'bank_account_number' => 6037-7643-9874-8754,
            'latitude' => 50,
            'longitude' => 49,
        ]);
    }
}
