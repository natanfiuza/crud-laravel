<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('marcas')->truncate();
        Schema::enableForeignKeyConstraints();
        \App\Models\Marca::insert([
            ["id" => 1, "name" => 'Multilaser',],
            ["id" => 2, "name" => 'McAfee',],
            ["id" => 3, "name" => 'Microsoft',],
        ]);
    }
}
