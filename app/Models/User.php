<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
//spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ci','fechanacimiento',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vehiculo()
    {
        return $this->hasMany(vehiculo::class, 'userid');
    }
    public function alquileres()
    {
        return $this->hasMany(alquiler::class, 'userid');
    }

    public static function boot()
{
    parent::boot();

    static::updating(function ($user) {
        if ($user->state === 'activo' && $user->isDirty('name')) {
            dd($user);
            $originalName = $user->getOriginal('name');
            $newName = $user->getAttribute('name');

            if (User::isDrasticChange($originalName, $newName)) {
                $errorMessage = "No se permite cambiar drásticamente el nombre de usuario.";
                $validator = Validator::make([], []);
                $validator->errors()->add('name', $errorMessage);
                throw new \Illuminate\Validation\ValidationException($validator);
            }
        }
    });
}
 private static function isDrasticChange($originalName, $newName)
    {
        // Implementa tu lógica personalizada aquí.
        // Puedes usar la implementación proporcionada anteriormente o crear tu propia lógica.

        $threshold = 7; // Define el umbral para cambios drásticos

        $originalLength = strlen($originalName);
        $newLength = strlen($newName);

        return abs($originalLength - $newLength) > $threshold;
    }


    
}
