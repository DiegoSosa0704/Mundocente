<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVinculacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculacions', function (Blueprint $table) {
            $table->increments('id_vinculacion');
            $table->integer('id_user_fk')->unsigned();
            $table->foreign('id_user_fk')->references('id')->on('users');
            $table->integer('id_institution_fk')->unsigned();
            $table->foreign('id_institution_fk')->references('id_institution')->on('institucions');
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
        Schema::drop('vinculacions');
    }
}
