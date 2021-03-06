<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->increments('id_denuncia');
            $table->integer('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users');
            $table->integer('id_publication_fk')->unsigned();
            $table->foreign('id_publication_fk')->references('id_publication')->on('publicacions');
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
        Schema::drop('denuncias');
    }
}
