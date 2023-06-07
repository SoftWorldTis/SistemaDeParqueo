<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alquiler extends Model
{
    use HasFactory;
    protected $table ="alquiler";
    protected $primaryKey = "alquilerid";
    public $timestamps = false;

    public function factura()
    {
        return $this->hasOne(factura::class, 'alquilerid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function estacionamiento()
    {
        return $this->belongsTo(estacionamiento::class, 'estacionamientoid');
    }

    public function entradaSalida()
    {
        return $this->hasMany(entradaSalida::class, 'alquilerid');
    }
}
