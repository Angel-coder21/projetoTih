<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tih_viatura', function (Blueprint $table) {
            $table->id();
            $table->String('identificacao',255)->nullable();
            $table->String('placa',255)->nullable();
            $table->enum('tipo',['Básica','Avançada'])->nullable();
            $table->integer('situacao')->nullable();
            $table->String('id_gps',255)->nullable();
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
        Schema::dropIfExists('tih_viatura');
    }
};
