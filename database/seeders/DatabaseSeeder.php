<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Teste Adm',
            'username' => 'TestAdm',
            'cpf' => '67890123456',
            'password' => 'Password',
            'is_adm' => true,
            'is_sec' => true,
            'is_prof' => true,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Teste Sec',
            'username' => 'TestSec',
            'cpf' => '09876543210',
            'password' => 'Password',
            'is_adm' => false,
            'is_sec' => true,
            'is_prof' => false,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Teste Prof',
            'username' => 'TestProf',
            'cpf' => '65432109876',
            'password' => 'Password',
            'is_adm' => false,
            'is_sec' => false,
            'is_prof' => true,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Teste Teste',
            'username' => 'TestUser',
            'cpf' => '12345678901',
            'endereço' => 'wasd',
            'filme' => 'asd',
            'password' => 'Password',
            'is_adm' => false,
            'is_sec' => false,
            'is_prof' => false,
        ]);
        \App\Models\User::factory(10)->create([
            'is_prof' => false,
            'is_sec' => false,
            'is_adm' => false,
        ]);
        //\App\Models\Professor::factory(5)->create();
        \App\Models\Curso::factory(10)->create();
    }
}
