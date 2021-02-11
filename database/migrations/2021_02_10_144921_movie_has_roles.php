<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MovieHasRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_has_roles', function (Blueprint $table) {
            $table->unsignedInteger('movie_id')->index();
            $table->unsignedInteger('role_id')->index();
            $table->timestamps();

            $table->foreign('movie_id')
                ->references('id')
                ->on('movies');

            $table->foreign('role_id')
                ->references('id')
                ->on('movie_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_has_roles');
    }
}
