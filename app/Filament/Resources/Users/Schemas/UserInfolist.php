<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('last_name')
                    ->placeholder('-'),
                TextEntry::make('role')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('email_verified_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('company_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('privacy_policy_accepted_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('terms_accepted_at')
                    ->dateTime()
                    ->placeholder('-'),
                IconEntry::make('marketing_consent')
                    ->boolean()
                    ->placeholder('-'),
                IconEntry::make('newsletter_subscription')
                    ->boolean()
                    ->placeholder('-'),
                IconEntry::make('data_processing_consent')
                    ->boolean()
                    ->placeholder('-'),
                TextEntry::make('data_processing_consent_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('data_erasure_requested_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('data_anonymized_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('ip_address')
                    ->placeholder('-'),
                TextEntry::make('user_agent')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (User $record): bool => $record->trashed()),
                TextEntry::make('expires_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('activated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
