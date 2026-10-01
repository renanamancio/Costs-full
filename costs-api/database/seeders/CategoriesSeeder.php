<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => (string) Str::uuid(), 'name' => 'Desenvolvimento', 'cor' => '#341294', 'created_at' => now(), 'updated_at' => now()],
            ['id' => (string) Str::uuid(), 'name' => 'Infra', 'cor' => '#94122e', 'created_at' => now(), 'updated_at' => now()],
            ['id' => (string) Str::uuid(), 'name' => 'Testes', 'cor' => '#8b9412', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}