<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucions', function (Blueprint $table) {
            $table->increments('id_institution');
            $table->string('name_institution');
            $table->enum('setor_institution', ['universitario', 'especializacion', 'maestria', 'doctorado', 'post_doctorado']);
            $table->string('telephone_institution');
            $table->enum('state_institution', ['activo', 'inactivo', 'nuevo']);
            $table->integer('id_lugar_fk')->unsigned();
            $table->foreign('id_lugar_fk')->references('id_lugar')->on('lugars');
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
        Schema::drop('institucions');
    }
}
