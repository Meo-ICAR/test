<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event; // <--- Fondamentale
use Laravel\Cashier\Events\WebhookReceived; // <--- Fondamentale
use Illuminate\Support\Facades\Log;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
public function boot(): void
    {
        // Registriamo il log del webhook direttamente qui
        Event::listen(WebhookReceived::class, function (WebhookReceived $event) {
            Log::channel('stripe')->info('Webhook ricevuto su OVH:', [
                'tipo' => $event->payload['type'],
                'id_evento' => $event->payload['id'],
                'data' => now()->toDateTimeString(),
            ]);
        });
    }
}
