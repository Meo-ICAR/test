<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    public function handle(Request $request, Closure $next): Response
    {
        // Se l'utente non è autenticato o non ha un abbonamento attivo chiamato 'default'
        if (!$request->user() || !$request->user()->subscribed('default')) {

            // Se la richiesta è per Filament (AJAX), restituiamo un errore 403
            if ($request->expectsJson()) {
                abort(403, 'Abbonamento richiesto.');
            }

            // Altrimenti reindirizziamo alla pagina dei prezzi
            return redirect()->route('pricing')->with('error', 'Devi essere abbonato per accedere.');
        }

        return $next($request);
    }
}
