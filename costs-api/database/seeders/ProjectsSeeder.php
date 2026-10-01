<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = DB::table('users')->where('email', 'estoucerto@konoha.com')->value('id');
        $user2 = DB::table('users')->where('email', 'renegado@konoha.com')->value('id');
        $user3 = DB::table('users')->where('email', 'elastico@pirata.com')->value('id');

        $dev = DB::table('categories')->where('name', 'Desenvolvimento')->value('id');
        $infra = DB::table('categories')->where('name', 'Infra')->value('id');
        $testes = DB::table('categories')->where('name', 'Testes')->value('id');

        $projects = [
            // User 1, Category 1 (Dev)
            ['name' => 'Website Ramen Ichiraku', 'budget' => '1500', 'cost' => '1000', 'category_id' => $dev, 'user_id' => $user1],
            ['name' => 'Website Memorial Uzumaki', 'budget' => '2000', 'cost' => '800', 'category_id' => $dev, 'user_id' => $user1],
            ['name' => 'Website Exame Chunin', 'budget' => '1700', 'cost' => '1150', 'category_id' => $dev, 'user_id' => $user1],

            // User 1, Category 2 (Infra)
            ['name' => 'Servidor da Vila da Folha', 'budget' => '3500', 'cost' => '2100', 'category_id' => $infra, 'user_id' => $user1],
            ['name' => 'Servidor de comunicações da ANBU', 'budget' => '4200', 'cost' => '3100', 'category_id' => $infra, 'user_id' => $user1],

            // User 1, Category 3 (Testes)
            ['name' => 'Testes do sistema Kage Bunshin API', 'budget' => '1200', 'cost' => '400', 'category_id' => $testes, 'user_id' => $user1],
            ['name' => 'Testes unitários do módulo Rasengan', 'budget' => '2100', 'cost' => '900', 'category_id' => $testes, 'user_id' => $user1],

            // User 2, Category 1 (Dev)
            ['name' => 'Website do Clã Uchiha', 'budget' => '1800', 'cost' => '950', 'category_id' => $dev, 'user_id' => $user2],
            ['name' => 'Website de recrutamento Akatsuki', 'budget' => '2500', 'cost' => '1200', 'category_id' => $dev, 'user_id' => $user2],

            // User 2, Category 2 (Infra)
            ['name' => 'Servidor de sites Uchiha', 'budget' => '800', 'cost' => '100', 'category_id' => $infra, 'user_id' => $user2],
            ['name' => 'Servidor de emails renegados', 'budget' => '3000', 'cost' => '1800', 'category_id' => $infra, 'user_id' => $user2],
            ['name' => 'Servidor do banco de dados sharingan', 'budget' => '5000', 'cost' => '1010', 'category_id' => $infra, 'user_id' => $user2],

            // User 2, Category 3 (Testes)
            ['name' => 'Testes de segurança do Genjutsu Tsukuyomi', 'budget' => '3100', 'cost' => '1500', 'category_id' => $testes, 'user_id' => $user2],
            ['name' => 'Testes de carga do sistema Amaterasu', 'budget' => '2800', 'cost' => '1100', 'category_id' => $testes, 'user_id' => $user2],

            // User 3, Category 1 (Dev)
            ['name' => 'Website do restaurante Baratie', 'budget' => '1600', 'cost' => '900', 'category_id' => $dev, 'user_id' => $user3],
            ['name' => 'Website do Jornal da Economia do Mar', 'budget' => '2200', 'cost' => '1300', 'category_id' => $dev, 'user_id' => $user3],

            // User 3, Category 2 (Infra)
            ['name' => 'Servidor de rotas do Log Pose', 'budget' => '3800', 'cost' => '2200', 'category_id' => $infra, 'user_id' => $user3],
            ['name' => 'Servidor da base da Marinha G-5', 'budget' => '4500', 'cost' => '2900', 'category_id' => $infra, 'user_id' => $user3],

            // User 3, Category 3 (Testes)
            ['name' => 'Testes da API pirataServer', 'budget' => '1890', 'cost' => '300', 'category_id' => $testes, 'user_id' => $user3],
            ['name' => 'Testes unitários do projeto rei_dos_piratas', 'budget' => '2400', 'cost' => '600', 'category_id' => $testes, 'user_id' => $user3],
            ['name' => 'Testes automatizados de UI do site Ilha dos Peixes', 'budget' => '4900', 'cost' => '1400', 'category_id' => $testes, 'user_id' => $user3],
        ];

        foreach ($projects as $project) {
            DB::table('projects')->insert(array_merge($project, [
                'id' => (string) Str::uuid(),
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
