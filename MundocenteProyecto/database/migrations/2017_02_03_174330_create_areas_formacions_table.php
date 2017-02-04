<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasFormacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas_formacions', function (Blueprint $table) {
            $table->increments('id_areas_formacion');
            $table->integer('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users');
            $table->integer('id_theme_fk')->unsigned();
            $table->foreign('id_theme_fk')->references('id_tema')->on('temas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('areas_formacions');
    }
}
