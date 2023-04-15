<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    public $timestamps = false;
    use HasFactory;
    protected $table= 'alquiler';
    protected $primaryKey = 'AlquilerId';
    protected $fillable=[
        'AlquilerPrecio',
        'AlquilerFechaIni',
        'AlquilerFechaFin',
        'AlquilerSitio',
        'AlquilerEstadoPago',
        'AlquilerFecha',
        'Cliente' ,
        'Estacionamiento' ,
        'AlquilercolTipoPago'
    ];
}
