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
        Schema::create('gestao_token', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gestao_id');
            $table->foreign('gestao_id')->references('id')->on('gestao')->onDelete('cascade');
            $table->text('token');
            $table->timestamp('valido_ate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gestao_token', function (Blueprint $table) {
            $table->dropForeign(['inspetoras_id']);
            });

    
        Schema::dropIfExists('gestao_token');
    }
};
