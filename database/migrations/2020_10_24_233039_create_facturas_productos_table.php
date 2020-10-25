<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #migration para crear tabla facturas_productos
        Schema::create('facturas_productos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_factura')->unsigned();
            $table->bigInteger('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->foreign('id_producto')->references('id')->on('productos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas_productos');
    }
}
