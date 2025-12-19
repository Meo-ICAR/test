<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('last_name'),
                TextInput::make('role')
                    ->default('actor'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('company_id')
                    ->numeric(),
                DateTimePicker::make('privacy_policy_accepted_at'),
                DateTimePicker::make('terms_accepted_at'),
                Toggle::make('marketing_consent'),
                Toggle::make('newsletter_subscription'),
                Toggle::make('data_processing_consent'),
                DateTimePicker::make('data_processing_consent_at'),
                DateTimePicker::make('data_erasure_requested_at'),
                DateTimePicker::make('data_anonymized_at'),
                TextInput::make('ip_address'),
                Textarea::make('user_agent')
                    ->columnSpanFull(),
                DateTimePicker::make('expires_at'),
                DateTimePicker::make('activated_at'),
            ]);
    }
}
