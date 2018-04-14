<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsdetallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemsdetalls', function (Blueprint $table) {
            $table->increments('id');
            $table->text('producto')->nullable();
            $table->string('codbarra',35)->nullable();
            $table->string('precio',35)->nullable();
            $table->string('cant',20)->nullable();
            $table->double('total',15,2)->nullable();
            $table->double('descuento',15,2)->nullable();
            $table->integer('id_producto')->unsigned();   
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->integer('id_proforma')->unsigned();   
            $table->foreign('id_proforma')->references('id')->on('proformas');
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
        Schema::dropIfExists('itemsdetalls');
    }
}
