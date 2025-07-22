<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('analises_viabilidade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nome_negocio');
            $table->string('tipo_negocio');
            $table->decimal('capital_inicial', 15, 2);
            $table->string('provincia');
            $table->string('localizacao');
            $table->string('concorrencia');
            $table->string('demanda_local');
            $table->string('experiencia');
            $table->string('fornecedores');
            $table->string('apoio');
            $table->integer('retorno');
            $table->string('resultado')->nullable(); // resposta do modelo de IA
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analises_viabilidade');
    }
};
