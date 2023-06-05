<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estacionamiento extends Model
{
    use HasFactory;

    protected $table ="estacionamiento";
    protected $primaryKey = "estacionamientoid";
    public $timestamps = false;

 /*
   protected $fillable = ['estacionamientoid','estacionamientocorreo',
   'estacionamientozona','estacionamientohorario','estacionamientositioDocente',
   'estacionamientoprecio','estacionamientoestado','estacionamientositioAdministrador'
   ,'estacionamientoqr','estacionamientotelefono'];*/
   public function alquileres()
   {
       return $this->hasMany(alquiler::class, 'estacionamientoid');
   }
}
