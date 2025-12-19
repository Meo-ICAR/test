<x-filament-panels::page>
    <div class="grid grid-cols-1 gap-6">

        {{-- Card Stato Abbonamento --}}
        <x-filament::section>
            <x-slot name="heading">Dettagli Piano</x-slot>
            @if($subscription && $subscription->active())
                <p>Sei attualmente abbonato al piano <strong>{{ $subscription->type }}</strong>.</p>
                <p class="text-sm text-gray-500">Prossimo rinnovo: {{ $subscription->asStripeSubscription()->current_period_end->asDateTime()->format('d/m/Y') }}</p>
            @else
                <p>Non hai un abbonamento attivo.</p>
                <x-filament::button href="/pricing" tag="a">Vedi i Piani</x-filament::button>
                <x-filament::button wire:click="redirectToBillingPortal" color="gray">
    Aggiorna Metodo di Pagamento
</x-filament::button>
            @endif
        </x-filament::section>

        {{-- Tabella Fatture --}}
        <x-filament::section>
            <x-slot name="heading">Storico Fatture</x-slot>
            <table class="w-full text-left divide-y">
                <thead>
                    <tr>
                        <th class="py-2">Data</th>
                        <th class="py-2">Totale</th>
                        <th class="py-2">Azioni</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($invoices as $invoice)
                        <tr>
                            <td class="py-3">{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td class="py-3">{{ $invoice->total() }}</td>
                            <td class="py-3">
                                <x-filament::button
                                    wire:click="downloadInvoice('{{ $invoice->id }}')"
                                    size="sm"
                                    icon="heroicon-m-arrow-down-tray">
                                    Scarica PDF
                                </x-filament::button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-4 text-center text-gray-500">Nessuna fattura disponibile.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </x-filament::section>
    </div>
</x-filament-panels::page>
