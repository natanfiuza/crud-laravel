<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('type_users')->truncate();
        Schema::enableForeignKeyConstraints();
        \App\Models\TypeUser::insert([
            ["id" => 1, "name" => 'Administrador'],
            ["id" => 2, "name" => 'Comum'],
        ]);
    }
}
