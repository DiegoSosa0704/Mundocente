<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevistaNivelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revista_nivels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_level_fk')->unsigned();
            $table->foreign('id_level_fk')->references('id_level')->on('nivels');
            $table->integer('id_publications_fk')->unsigned();
            $table->foreign('id_publications_fk')->references('id_publication')->on('publicacions');
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
        Schema::drop('revista_nivels');
    }
}
