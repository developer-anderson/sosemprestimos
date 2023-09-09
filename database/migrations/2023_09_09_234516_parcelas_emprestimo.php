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
        Schema::create('parcelas_emprestimo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emprestimo_id')->constrained('emprestimos');
            $table->decimal('valor', 10, 2);
            $table->date('data_vencimento');
            $table->boolean('pago')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelas_emprestimo');
    }
};
