<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('produtos')->truncate();
        Schema::enableForeignKeyConstraints();
        \App\Models\Produto::insert([
            ["id" => 1, "name" => 'Teclado 64K', "price" => 129.30 ,"categoria_id" => 1, "marca_id" => 1,],
            ["id" => 2, "name" => 'Mouse HighTech', "price" => 74.50, "categoria_id" => 1, "marca_id" => 1,],
            ["id" => 3, "name" => 'Antivirus Mcafee 5.0', "price" => 39.80, "categoria_id" => 2, "marca_id" => 2,],
            ["id" => 4, "name" => 'Office 365', "price" => 179.10, "categoria_id" => 2, "marca_id" => 3,],
            ["id" => 5, "name" => 'Mouse Pad 90x40', "price" => 48.20, "categoria_id" => 3, "marca_id" => 1,],
            ["id" => 6, "name" => 'Suporte de Celular', "price" => 20,"categoria_id" => 3, "marca_id" => 1,],
        ]);
    }
}
