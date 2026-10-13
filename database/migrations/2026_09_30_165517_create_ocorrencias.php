<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_aluno_ocorrido')
                ->constrained('aluno')
                ->cascadeOnDelete();

            $table->foreignId('inspetora_responsavel')
                ->constrained('inspetoras')
                ->cascadeOnDelete();

            $table->text('procedimento_realizado');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ocorrencias');
    }
};