<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entradaSalida extends Model
{
    use HasFactory;

    protected $table ="entrada_salida";
    protected $primaryKey = "esid";
    public $timestamps = false;

    public function vehiculo()
    {
        return $this->belongsTo(vehiculo::class, 'vehiculoid');
    }

    public function alquiler()
    {
        return $this->belongsTo(alquiler::class, 'alquilerid');
    }
}
