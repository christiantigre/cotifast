<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Subcategoria')->nullable();
            $table->string('detalle')->nullable();
            $table->boolean('activo')->default(1);
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        Schema::drop('subcategorias');
    }
}
