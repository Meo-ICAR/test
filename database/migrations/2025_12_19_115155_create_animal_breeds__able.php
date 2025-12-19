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
        Schema::create('animal_breeds', function (Blueprint $table) {
            $table->id();

            // Relazione con la tabella species
            // cascadeOnDelete rimuove le razze se la specie viene eliminata
            $table->foreignId('species_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('slug')->unique();

            // Utile per raggruppare (es. Taglia Piccola, Media, Grande o Gruppi ENCI)
            $table->string('category_group')->nullable();

            // Descrizione standard della razza per il casting
            $table->text('standard_description')->nullable();

            $table->timestamps();

            // Indice per velocizzare le ricerche per nome e specie
            $table->index(['species_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_breeds');
    }
};
