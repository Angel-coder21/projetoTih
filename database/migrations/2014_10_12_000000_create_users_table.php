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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('tipo_documento', ['CPF','CRM','COREN','CNH'])->nullable();
            $table->string('numero_documento','255')->nullable();
            $table->string('categoria_cnh','255')->nullable();
            $table->enum('cargo', ['MEDICO','ENFERMEIRO','TECNICO ENFERMAGEM','NIR','BASE','CONDUTOR'])->nullable();
            $table->integer('status')->nullable();
            $table->string('contato_tel','255')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
