<?php

namespace Database\Seeders;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = User::updateOrCreate([
            'email' => 'admin@natanfiuza.dev.br'
        ], [
            'name' => 'Admin',
            'email' => 'admin@natanfiuza.dev.br',
            'password' => bcrypt('abc123'),
            'typeuser_id' => 1,
            'uuid' => Uuid::uuid4(),
        ]);
        $user_comum = User::updateOrCreate([
            'email' => 'comum@natanfiuza.dev.br'
        ], [
            'name' => 'Comum',
            'email' => 'comum@natanfiuza.dev.br',
            'password' => bcrypt('abc123'),
            'typeuser_id' => 2,
            'uuid' => Uuid::uuid4(),
        ]);
    }
}
