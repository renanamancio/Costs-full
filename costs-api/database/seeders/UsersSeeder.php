<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => (string) Str::uuid(),
                'name' => 'Naruto Uzumaki',
                'email' => 'estoucerto@konoha.com',
                'password' => bcrypt('123456'),
                'authorization' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Sasuke Uchiha',
                'email' => 'renegado@konoha.com',
                'password' => bcrypt('123456'),
                'authorization' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Luffy',
                'email' => 'elastico@pirata.com',
                'password' => bcrypt('123456'),
                'authorization' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
