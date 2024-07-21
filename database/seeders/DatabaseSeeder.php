<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

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

        \App\Models\Layer::factory(10)->create();

        \App\Models\Account::factory(30)->create();







        \App\Models\Account::factory()->create([
            'name' => 'UnProtected Account',
            'layer_id' => 1,
            // 'password' => Crypt::encryptString('password'),
            'password' => 'password',
            'username' => 'user1',
            'url' => 'http://www.user1.com',
            'email' => 'teste@email.com',
            'notes' => 'Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
        ]);
        \App\Models\Account::factory()->create([
            'name' => 'UnProtected Account 2',
            'layer_id' => 1,
            // 'password' => Crypt::encryptString('password'),
            'password' => 'password2',
            'username' => 'user2',
            'url' => 'http://www.user1.com',
            'email' => 'teste@email.com',
            'notes' => ' Mussum, Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
        ]);
        \App\Models\Account::factory()->create([
            'name' => 'UnProtected Account',
            'layer_id' => 2,
            // 'password' => Crypt::encryptString('password'),
            'password' => 'password3',
            'username' => 'user1',
            'url' => 'http://www.user1.com',
            'email' => 'teste@email.com',
            'notes' => 'Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
        ]);
        \App\Models\Account::factory()->create([
            'name' => 'UnProtected Account',
            'layer_id' => 2,
            // 'password' => Crypt::encryptString('password'),
            'password' => 'password4',
            'username' => 'user1',
            'url' => 'http://www.user1.com',
            'email' => 'teste@email.com',
            'notes' => 'Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
        ]);
        \App\Models\Account::factory()->create([
            'name' => 'UnProtected Account',
            'layer_id' => 3,
            // 'password' => Crypt::encryptString('password'),
            'password' => 'password5',
            'username' => 'user1',
            'url' => 'http://www.user1.com',
            'email' => 'teste@email.com',
            'notes' => 'Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
        ]);
        \App\Models\Account::factory()->create([
            'name' => 'UnProtected Account',
            'layer_id' => 3,
            // 'password' => Crypt::encryptString('password'),
            'password' => 'password6',
            'username' => 'user2',
            'url' => 'http://www.user1.com',
            'email' => 'teste@email.com',
            'notes' => 'Mussum Ipsum, cacilds vidis litro abertis. Casamentiss faiz malandris se pirulitá. Interessantiss quisso pudia ce receita bolis, mais bolis eu num gostis.',
        ]);
    }
}
