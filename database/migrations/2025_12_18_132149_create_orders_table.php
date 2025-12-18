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
Schema::create('orders', function (Blueprint $table){
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('product_id')->constrained(); // Collegamento al prodotto

    $table->decimal('amount', 10, 2);    // Copia del prezzo al momento dell'acquisto
    $table->string('status')->default('pending'); // pending, paid, cancelled

    // Campi per le date dell'abbonamento
    $table->timestamp('activated_at')->nullable(); // Quando viene pagato
    $table->timestamp('expires_at')->nullable();   // Scadenza calcolata

    // Riferimento per Stripe
    $table->string('stripe_session_id')->nullable();
    $table->timestamps();
});
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
