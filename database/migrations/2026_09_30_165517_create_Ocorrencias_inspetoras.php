<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ocorrencias_inspetoras', function (Blueprint $table) {
            $table->id();

            $table->string('rm_aluno', 5);

            $table->foreignId('id_aluno')
                ->constrained('aluno')
                ->cascadeOnDelete();

            $table->string('turma_aluno', 10);

            $table->foreignId('inspetora_responsavel')
                ->constrained('inspetoras')
                ->cascadeOnDelete();

            $table->string('ocorrido', 200);

            $table->text('procedimento_realizado');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ocorrencias_inspetoras');
    }
};
