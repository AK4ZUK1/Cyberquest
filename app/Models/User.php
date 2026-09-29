<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The "booted" method of the model.
     */
    protected static function booted()
    {
    parent::booted();

    protected static function booted()
    {
    parent::booted();

    static::created(function ($user) {
        if ($user->role === 'pks') {
            \App\Models\Pks::firstOrCreate(
                ['email' => $user->email], // Match by email
                [
                    'company_name' => $user->name,
                    'owner_name'   => $user->name,
                    'phone_number' => '-',
                    'sector'       => 'Belum Tetap',
                    'status'       => 'Aktif',
                ]
            );
        }
    });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Added so the role can be saved properly during registration
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
        ];
    }
}