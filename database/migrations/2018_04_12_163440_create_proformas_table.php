<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proformas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_proforma')->nullable();
            $table->string('total')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('iva_cero')->nullable();
            $table->string('descuento')->nullable();
            $table->string('iva_calculado')->nullable();
            $table->string('porcentaje_iva')->nullable();
            $table->string('destinatario_mail')->nullable();
            $table->text('secuencial_proforma')->nullable();
            $table->text('detalles_proforma')->nullable();
            $table->text('cliente')->nullable();
            $table->text('contactos')->nullable();
            $table->text('documento_ruc')->nullable();
            $table->text('documento_ced')->nullable();
            $table->text('direccion_cliente')->nullable();
            $table->text('correo_cliente')->nullable();
            $table->boolean('enviado')->default(0);
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
        Schema::drop('proformas');
    }
}
