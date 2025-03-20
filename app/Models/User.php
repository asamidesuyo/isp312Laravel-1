<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

//    protected $table = 'users';

    protected $fillable = [
        'fio',
        'email',
        'birthday',
        'password',
    ];

//    protected $guarded = [
//
//    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

//    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'birthday' => 'date',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
