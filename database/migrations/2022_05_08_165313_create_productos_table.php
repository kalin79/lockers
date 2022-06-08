<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('id_categoria');
            $table->string('nombre');
            $table->string('slug');
            $table->text('usos')->nullable();
            $table->text('ficha')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('descripcion_corta')->nullable();
            $table->string('banner')->nullable();
            $table->string('altura')->nullable();
            $table->string('ancho')->nullable();
            $table->string('fondo')->nullable();
            $table->string('alto')->nullable();
            $table->string('ancho_puerta')->nullable();
            $table->string('material')->nullable();
            $table->string('pintura')->nullable();
            $table->string('puertas_reforzadas')->nullable();
            $table->string('bisagras')->nullable();
            $table->text('accesorios')->nullable();
            $table->text('garantia')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
