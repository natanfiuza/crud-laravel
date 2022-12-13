<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categorias')->truncate();
        Schema::enableForeignKeyConstraints();
        \App\Models\Categoria::insert([
            ["id" => 1, "name" => 'Eletrônicos',],
            ["id" => 2, "name" => 'Software',],
            ["id" => 3, "name" => 'Acessórios',],
        ]);
    }
}
