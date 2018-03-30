<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',191)->nullable();
            $table->string('apellido',191)->nullable();
            $table->text('cedula',15)->nullable();
            $table->text('ruc',15)->nullable();
            $table->text('email',45)->nullable();
            $table->text('telefono',15)->nullable();
            $table->text('cel_movi',15)->nullable();
            $table->text('cel_claro',15)->nullable();
            $table->text('wts',15)->nullable();
            $table->text('direccion',45)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->text('estado_civil',45);
            $table->text('genero',15);
            $table->boolean('activo')->default(1);
            $table->integer('pais_id')->unsigned();
            $table->integer('provincia_id')->unsigned();
            $table->integer('canton_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('paises');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('canton_id')->references('id')->on('cantons');
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
        Schema::drop('clientes');
    }
}
