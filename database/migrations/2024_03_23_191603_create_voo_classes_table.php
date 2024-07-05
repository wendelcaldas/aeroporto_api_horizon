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
        Schema::disableForeignKeyConstraints();

        Schema::create('voo_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voo_id');
            $table->unsignedBigInteger('classe_id');

            // $table->string('classe_nome');
            $table->integer('total_assentos');
            $table->integer('disponivel');
            $table->decimal('valor_assento', 10, 2);
            $table->timestamps();
        
            $table->foreign('voo_id')->references('id')->on('voos');
            $table->foreign('classe_id')->references('id')->on('classes');

            $table->unique(['voo_id', 'classe_id']); // relação unica entre 2 colunas pra que não haja voo com 2x a mesma class
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('voo_classes');

        Schema::enableForeignKeyConstraints();
    }
};
