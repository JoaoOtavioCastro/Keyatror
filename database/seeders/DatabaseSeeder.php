<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email',
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@email',
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@email',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Layer::factory()->create([
            'name' => 'UnProtected Layer',
            'is_protected' => false,
            'password' => null,
            'description' => 'Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
            'user_id' => 1,
        ]);
        \App\Models\Layer::factory()->create([
            'name' => 'UnProtected Layer',
            'is_protected' => false,
            'password' => null,
            'description' => 'Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
            'user_id' => 2,
        ]);
        \App\Models\Layer::factory()->create([
            'name' => 'UnProtected Layer',
            'is_protected' => false,
            'password' => null,
            'description' => 'Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
            'user_id' => 3,
        ]);
        
         \App\Models\Layer::factory(20)->create();
       
         \App\Models\Account::factory(100)->create();
    }
}
