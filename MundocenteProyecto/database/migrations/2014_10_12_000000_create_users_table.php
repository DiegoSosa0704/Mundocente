<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->enum('rol', ['admin', 'publisher', 'seeker', 'student']);
            $table->string('password', 60);
            $table->string('curriculo_url');
            $table->enum('recibe_not', ['si', 'no']);
            $table->enum('nivel_formacion', ['ninguno','universitario', 'especializacion', 'maestria', 'doctorado', 'post_doctorado']);
            $table->string('photo_url');
            $table->enum('state_user', ['avtivo', 'inactivo']);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
