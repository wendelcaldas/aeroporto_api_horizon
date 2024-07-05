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
        // Desativar as restrições de chave estrangeira
        Schema::disableForeignKeyConstraints();

        Schema::create('voos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_voo', 4)->unique();
            $table->unsignedBigInteger('aeroporto_origem_id');
            $table->unsignedBigInteger('aeroporto_destino_id');
            $table->dateTime('partida_datetime');
            $table->boolean('status')->default(1)->comment('0: cancelado, 1: confirmado');
            $table->timestamps();
        
            $table->foreign('aeroporto_origem_id')->references('id')->on('aeroportos');
            $table->foreign('aeroporto_destino_id')->references('id')->on('aeroportos');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Desativar as restrições de chave estrangeira
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('voos');

        Schema::enableForeignKeyConstraints();
    }
};
