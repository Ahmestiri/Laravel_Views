<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //Attributes
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'class',
        'pole',
        'bureau',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Create a Profile to User
    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create(['image' => '',]);
        });
    }
    //Connect Profile to User
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
