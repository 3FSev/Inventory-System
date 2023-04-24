<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'OTHERS'
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

        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Items::factory(10)->create();
    }
}
