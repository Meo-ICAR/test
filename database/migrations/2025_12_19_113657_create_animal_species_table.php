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
        Schema::create('species', function (Blueprint $table) {
            $table->id();

            // Nome della specie (es. Cane, Gatto, Cavallo)
            $table->string('name')->unique();

            // Slug per URL amichevoli (es. casting-animali.it/specie/cane)
            $table->string('slug')->unique();

            // Un campo opzionale per icone (es. Heroicons o classi CSS)
            $table->string('icon')->nullable();

            // Per gestire eventuali descrizioni o note interne
            $table->text('description')->nullable();

            // Utile per ordinare la visualizzazione (es. i cani prima degli esotici)
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_species');
    }
};
