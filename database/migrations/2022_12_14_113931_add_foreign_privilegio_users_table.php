<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'privilegio_users',
            function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('privilegio_id')->references('id')->on('privilegios');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('privilegio_users', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('privilegio_id');
        });
    }
};
