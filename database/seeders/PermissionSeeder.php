<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name' => 'create-category', //create , store
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'viewAny-categories', // index
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'view-category', // show
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'update-category', // edit , update
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'delete-category', // destroy
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'create-food',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'viewAny-foods',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'view-food',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'update-food',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'delete-food',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
