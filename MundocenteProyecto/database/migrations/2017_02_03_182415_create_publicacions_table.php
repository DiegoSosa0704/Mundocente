<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->increments('id_publication');
            $table->string('title_publication');
            $table->text('description_publication');
            $table->enum('sector_publication', ['universitario', 'especializacion', 'maestria', 'doctorado', 'post_doctorado']);
            $table->string('url_publication');
            $table->string('url_photo_publication');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('count_view');
            $table->string('contact_pubication');
            $table->enum('state_publication', ['activo', 'inactivo']);
            $table->time('hour_start');
            $table->time('hour_end');
            $table->enum('type_solicitud', ['investigador', 'evaluador']);
            $table->integer('id_type_publication')->unsigned();
            $table->foreign('id_type_publication')->references('id_type_publications')->on('tema__notificacions');
            $table->integer('id_lugar_fk')->unsigned();
            $table->foreign('id_lugar_fk')->references('id_lugar')->on('lugars');
            $table->integer('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users');


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
        Schema::drop('publicacions');
    }
}
