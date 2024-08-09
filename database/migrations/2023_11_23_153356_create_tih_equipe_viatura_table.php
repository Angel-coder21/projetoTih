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
        Schema::create('tih_equipe_viatura', function (Blueprint $table) {
            $table->id();
            $table->String('equipe_viatura',255)->nullable();
            $table->unsignedBigInteger('fk_viatura')->nullable();
            $table->unsignedBigInteger('fk_user_condutor')->nullable();
            $table->unsignedBigInteger('fk_user_medico')->nullable();
            $table->unsignedBigInteger('fk_user_enfermeiro')->nullable();
            $table->unsignedBigInteger('fk_user_tec_enfermagem')->nullable();
            $table->date('data')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();

            $table->foreign('fk_viatura')->references('id')->on('tih_viatura');
            $table->foreign('fk_user_condutor')->references('id')->on('users');
            $table->foreign('fk_user_medico')->references('id')->on('users');
            $table->foreign('fk_user_enfermeiro')->references('id')->on('users');
            $table->foreign('fk_user_tec_enfermagem')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tih_equipe_viatura');
    }
};
