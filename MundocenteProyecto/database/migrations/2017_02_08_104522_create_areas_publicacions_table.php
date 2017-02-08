<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasPublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas_publicacions', function (Blueprint $table) {
            $table->increments('id_areas_publication');
            $table->integer('id_publication_fk')->unsigned();
            $table->foreign('id_publication_fk')->references('id_publication')->on('publicacions');
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
        Schema::drop('areas_publicacions');
    }
}
