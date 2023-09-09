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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 255);
            $table->string('whatsapp', 15);
            $table->string('cep', 10);
            $table->string('logradouro', 255);
            $table->string('numero', 100);
            $table->string('bairro', 100);
            $table->string('cidade',100);
            $table->string('estado', 2);
            $table->longText('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
