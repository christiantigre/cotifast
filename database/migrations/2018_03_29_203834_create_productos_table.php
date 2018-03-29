<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('producto')->nullable();
            $table->string('cod_barra')->nullable()->unique();
            $table->double('pre_compra',15,2)->nullable();
            $table->double('pre_venta',15,2)->nullable();
            $table->string('cantidad')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('compras')->nullable();
            $table->string('ventas')->nullable();
            $table->string('saldo')->nullable();
            $table->string('imagen')->nullable();
            $table->string('name_img')->nullable();
            $table->boolean('nuevo')->default(1);
            $table->boolean('promocion')->default(1);
            $table->boolean('catalogo')->default(1);
            $table->boolean('activo')->default(1);
            $table->text('propaganda')->nullable();
            $table->integer('categoria_id')->unsigned()->nullable();
            $table->integer('subcategoria_id')->unsigned()->nullable();
            $table->integer('marca_id')->unsigned()->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias');
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
        Schema::drop('productos');
    }
}
