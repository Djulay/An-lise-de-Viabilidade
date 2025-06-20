<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('cursos', function (Blueprint $table) {
    $table->id();
    $table->string('imagem')->nullable();
    $table->string('nome');
    $table->string('duracao')->nullable();
    $table->decimal('custo', 10, 2)->nullable();
    $table->string('requisito')->nullable();
    $table->enum('modalidade', ['Presencial', 'Hibrida']);
    $table->string('local')->nullable();
    $table->string('ofertas')->nullable();
    $table->text('descricao')->nullable();
    $table->boolean('destaque')->default(false);
    $table->integer('inscritos')->default(0); // 👈 Adicionado aqui
    $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
