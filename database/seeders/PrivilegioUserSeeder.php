<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrivilegioUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('privilegio_users')->truncate();
        Schema::enableForeignKeyConstraints();
        \App\Models\PrivilegioUser::insert([
            [ "user_id" => 2, "privilegio_id" => 1],
            [ "user_id" => 2, "privilegio_id" => 2],
            [ "user_id" => 2, "privilegio_id" => 3],
            [ "user_id" => 1, "privilegio_id" => 1],
            [ "user_id" => 1, "privilegio_id" => 2],
        ]);
    }
}
