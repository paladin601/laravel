<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_form', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre',100);
            $table->string('Apellido',100);
            $table->integer('Cedula')->unsigned()->unique();
            $table->char('Sexo',1)->default('M');
            $table->boolean('Casado');
            $table->integer('Edad')->unsigned();
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
        Schema::dropIfExists('_form');
    }
}
