<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_proveedor');
            $table->string('correo_proveedor')->unique();
            $table->string('tel_cel_proveedor');
            $table->string('direccion_proveedor');
            $table->integer('ciudad_proveedor');
            $table->string('producto_ofrece');
            $table->integer('precio_producto');
            $table->string('observaciones');
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
        Schema::drop('proveedors');
    }
}
