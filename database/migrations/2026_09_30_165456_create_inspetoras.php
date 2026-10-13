<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inspetoras', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 11)->unique();
            $table->string('senha', 72);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspetoras');
    }
};