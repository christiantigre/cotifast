<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlmacensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('almacen')->nullable();
            $table->string('propietario')->nullable();
            $table->string('gerente')->nullable();
            $table->text('pag_web')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('ruc')->nullable();
            $table->string('email')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->string('logo')->nullable();
            $table->text('slogan')->nullable();
            $table->string('name_logo')->nullable();
            $table->boolean('activo')->default(1);
            $table->string('telefono')->nullable();
            $table->string('fax')->nullable();
            $table->string('cel_movi')->nullable();
            $table->string('cel_claro')->nullable();
            $table->string('watsapp')->nullable();
            $table->text('fb')->nullable();
            $table->text('tw')->nullable();
            $table->text('ins')->nullable();
            $table->text('gg')->nullable();
            $table->text('funcion_empresa')->nullable();
            $table->text('dirMatriz')->nullable();
            $table->text('dirSucursal')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->integer('pais_id')->unsigned();
            $table->integer('provincia_id')->unsigned();
            $table->integer('canton_id')->unsigned();
            $table->boolean('obligado_contabilidad')->default(0);
            $table->string('path_certificado')->nullable();
            $table->text('clave_certificado')->nullable();
            $table->boolean('modo_ambiente')->default(1);
            $table->boolean('tipo_emision')->deafult(1);
            $table->boolean('habilitar_facelectronica')->nullable();
            $table->string('auth_sri')->nullable();
            $table->string('codestablecimiento')->nullable();
            $table->string('codpntemision')->nullable();
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
        Schema::drop('almacens');
    }
}
