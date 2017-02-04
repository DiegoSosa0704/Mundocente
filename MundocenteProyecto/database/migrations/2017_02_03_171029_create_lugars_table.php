<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->increments('id_lugar');
            $table->string('name_lugar');
            $table->enum('type_lugar', ['country', 'city']);
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
        Schema::drop('lugars');
    }
}
