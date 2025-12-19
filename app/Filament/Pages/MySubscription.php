<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class MySubscription extends Page
{
   // protected static ?string $navigationIcon = 'heroicon-o-credit-card';
   // protected static string $view = 'filament.pages.my-subscription';
    protected static ?string $title = 'Il mio Abbonamento';
    protected static ?string $navigationLabel = 'Abbonamento';

    public function getViewData(): array
    {
        $user = Auth::user();

        return [
            'subscription' => $user->subscription('default'),
            'invoices' => $user->subscribed('default') ? $user->invoices() : [],
        ];
    }

    // Metodo per scaricare la fattura
    public function downloadInvoice($invoiceId)
    {
        return Auth::user()->downloadInvoice($invoiceId, [
            'vendor' => 'Tua Azienda srl',
            'product' => 'Abbonamento Premium',
        ]);
    }

    public function redirectToBillingPortal()
{
    return Auth::user()->redirectToBillingPortal(route('filament.admin.pages.my-subscription'));
}
}
