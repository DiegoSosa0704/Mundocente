<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemaNotificacionUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema_notificacion_usuarios', function (Blueprint $table) {
            $table->increments('id_theme_notificatons_users');
            $table->integer('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users');
            $table->integer('id_type_notifications_fk')->unsigned();
            $table->foreign('id_type_notifications_fk')->references('id_type_publications')->on('tema__notificacions');
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
        Schema::drop('tema_notificacion_usuarios');
    }
}
