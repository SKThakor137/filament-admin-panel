<?php

namespace App\Models;

// use Filament\Models\Contracts\FilamentUser;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Filament\Auth\MultiFactor\Email\Contracts\HasEmailAuthentication;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            // 'has_email_authentication' => 'boolean',
        ];
    }

//     public function canAccessPanel(\Filament\Panel $panel): bool
//     {
//         // Example: allow all users access. Adjust logic as needed.
//         return true;
//     }

//    public function hasEmailAuthentication(): bool
// {
//     return (bool) ($this->has_email_authentication ?? false);
// }

//        public function toggleEmailAuthentication(bool $condition): void
//     {
//         // This method should save whether or not the user has enabled email authentication.
    
//         $this->has_email_authentication = $condition;
//         $this->save();
//     }
}
