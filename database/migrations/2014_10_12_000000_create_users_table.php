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
            $table->enum('tipo_documento', ['CPF','CRM','COREN','CNH']);
            $table->integer('numero_documento')->unique();
            $table->string('categoria_cnh')->nullable();
            $table->enum('cargo', ['MEDICO','ENFERMEIRO','TECNICO ENFERMAGEM','NIR','BASE','CONDUTOR']);
            $table->integer('nivel')->nullable();
            $table->integer('status')->nullable();
            $table->string('contato_tel')->nullable();
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
