<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->integer('cedula')->nullable();
            $table->integer('ruc')->nullable();
            $table->string('email')->nullable();
            $table->integer('telefono')->nullable();
            $table->integer('cel_movi')->nullable();
            $table->integer('cel_claro')->nullable();
            $table->integer('wts')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('tipo_usuario')->nullable();
            $table->text('estado_civil')->nullable();
            $table->text('genero')->nullable();
            $table->boolean('activo')->default(1);
            $table->string('imagen')->nullable();
            $table->string('name_img')->nullable();
            $table->integer('pais_id')->unsigned()->nullable();
            $table->integer('provincia_id')->unsigned()->nullable();
            $table->integer('canton_id')->unsigned()->nullable();
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
        Schema::drop('perfils');
    }
}
