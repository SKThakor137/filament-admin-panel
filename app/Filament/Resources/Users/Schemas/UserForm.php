<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()                       // field is required
                    ->minLength(3)                     // minimum 3 characters
                    ->maxLength(50),                   // maximum 50 characters

                TextInput::make('email')
                    ->label('Email Address')
                    ->email()                          // must be a valid email
                    ->required()
                    ->unique('users', 'email'),       // unique in users table

                // TextInput::make('phone')
                //     ->label('Phone Number')
                //     ->tel()                            // HTML5 tel input
                //     ->required(false)                  // optional
                //     ->regex('/^\+?[0-9]{10,15}$/'),   // simple phone validation

                DateTimePicker::make('email_verified_at')
                    ->label('Verified At')
                    ->required(false),                 // optional field

                // TextInput::make('password')
                //     ->password()
                //     ->required()
                //     ->minLength(6)                     // minimum 6 characters
                //     ->maxLength(50),
            ]);
    }
}
