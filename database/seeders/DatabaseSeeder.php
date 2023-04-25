<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\Items;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      	//--------Role Seeder-------//
        DB::table('roles')->insert([
            [
                'name' => 'Employee'
            ],
            [
                'name' => 'Warehouse'
            ],
            [
                'name' => 'Admin'
            ]
        ]);
      
        //--------Category Seeder-------//
        DB::table('category')->insert([
            [
                'name' => 'IT Equipment'
            ],
            [
                'name' => 'Office Equipment'
            ],
            [
                'name' => 'Vehicle Spare Parts'
            ],
            [
                'name' => 'Communication Equipment'
            ],
            [
                'name' => 'Others'
            ]
        ]);

        //--------Department Seeder-------//
        DB::table('department')->insert([
            [
                'name' => 'Others'
            ],
            [
                'name' => 'OGM'
            ],
            [
                'name' => 'CPD'
            ],
            [
                'name' => 'FSD'
            ],
            [
                'name' => 'PGD'
            ],
            [
                'name' => 'ISD'
            ],
            [
                'name' => 'ASD'
            ],
            [
                'name' => 'IAP'
            ],
            [
                'name' => 'TSD'
            ],
            [
                'name' => 'BOD'
            ]
        ]);

        //--------Role Seeder-------//
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'warehouse.admin@gmail.com',
                'password' => bcrypt('ormeco.admin'),
                'role_id' => 3,
                'dept_id' => 1,
                'approved_at' =>  Carbon::now()
            ],
        ]);

        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Items::factory(10)->create();
    }
}
