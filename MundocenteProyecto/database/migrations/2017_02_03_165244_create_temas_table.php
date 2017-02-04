<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->increments('id_tema');
            $table->string('name_theme');
            $table->enum('type_theme', ['gran_area', 'area', 'disciplina']);
            $table->integer('id_tema_area')->unsigned();
            $table->foreign('id_tema_area')->references('id_tema')->on('temas');
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
        Schema::drop('temas');
    }
}
