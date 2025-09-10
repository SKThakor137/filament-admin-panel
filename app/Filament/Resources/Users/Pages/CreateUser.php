<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendUserCredentials;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected string $passwordForEmail;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Generate random password
        $plainPassword = str()->random(10);

        // Save hashed password
        $data['password'] = Hash::make($plainPassword);

        // Store plain password temporarily for email
        $this->passwordForEmail = $plainPassword;

        return $data;
    }

    protected function afterCreate(): void
    {
        // Send email with credentials
        Mail::to($this->record->email)->send(
            new SendUserCredentials(
                $this->record->email,
                $this->passwordForEmail
            )
        );
    }
}
