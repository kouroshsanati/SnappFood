<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin'
            ],
            [
                'name' => 'restaurant_manager'
            ]
        ]);
        \Spatie\Permission\Models\Role::query()->where('name','admin')->first()->syncPermissions(Permission::all());
        \Spatie\Permission\Models\Role::query()->find('2')->syncPermissions([
            6, 7, 8, 9, 10
        ]);


    }
}
