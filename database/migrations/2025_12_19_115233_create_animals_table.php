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
Schema::create('animals', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('species_id')->constrained('species');
    $table->foreignId('animal_breed_id')->constrained('animal_breeds');
    $table->string('name');
    $table->enum('gender', ['male', 'female', 'unknown']);
    $table->date('birth_date')->nullable();
    $table->decimal('weight', 5, 2)->nullable(); // in kg
    $table->text('special_signs')->nullable();
    $table->text('bio')->nullable();
    $table->string('location')->nullable();
    $table->decimal('latitude', 5, 2)->nullable(); // lat
    $table->decimal('longitude', 5, 2)->nullable(); // lng
    $table->boolean('is_certified')->default(false); // Pedigree o certificati vari
    $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
