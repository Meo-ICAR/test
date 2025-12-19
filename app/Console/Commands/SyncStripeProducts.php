<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stripe\StripeClient;
use App\Models\Product;

class SyncStripeProducts extends Command
{
    protected $signature = 'stripe:sync-products';
    protected $description = 'Sincronizza i prodotti e i prezzi dalla Dashboard Stripe al database locale';

   public function handle()
{
    // Verifica se la chiave esiste
    $secret = env('STRIPE_SECRET');
    if (!$secret) {
        $this->error('ERRORE: STRIPE_SECRET non trovato nel file .env');
        return;
    }

    $stripe = new \Stripe\StripeClient($secret);

    try {
        $this->info("Connessione a Stripe in corso...");

        // Recuperiamo i prezzi
        $prices = $stripe->prices->all([
            'active' => true,
            'limit' => 50,
            'expand' => ['data.product']
        ]);

        $this->info("Prezzi trovati su Stripe: " . count($prices->data));

        if (count($prices->data) === 0) {
            $this->warn("Attenzione: Nessun prezzo 'attivo' trovato nel tuo catalogo Stripe.");
            $this->line("Controlla che i prodotti abbiano l'interruttore 'Active' su ON nella Dashboard.");
            return;
        }

        foreach ($prices->data as $price) {
            $this->line("Elaborazione prodotto: " . ($price->product->name ?? 'Senza nome'));

            $product = \App\Models\Product::updateOrCreate(
                ['stripe_price_id' => $price->id],
                [
                    'name' => $price->product->name ?? 'Prodotto senza nome',
                    'stripe_product_id' => $price->product->id,
                    'amount' => $price->unit_amount,
                    'currency' => $price->currency,
                    'interval' => $price->recurring ? $price->recurring->interval : 'one_time',
                ]
            );

            if ($product->wasRecentlyCreated) {
                $this->info("✅ Creato: " . $product->name);
            } else {
                $this->comment("🔄 Aggiornato: " . $product->name);
            }
        }

    } catch (\Exception $e) {
        $this->error("ERRORE API STRIPE: " . $e->getMessage());
    }
}
}
