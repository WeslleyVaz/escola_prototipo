<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ocorrencia_log', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_ocorrencia')
                ->constrained('ocorrencias')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('id_aluno_ocorrido');

            $table->string('inspetora_responsavel', 100);

            $table->text('procedimento_realizado');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ocorrencia_log');
    }
};
