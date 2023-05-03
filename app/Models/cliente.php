<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    protected $table ="cliente";
    protected $primaryKey = "clienteci";
    public $timestamps = false;


    public function vehiculos()
{
    return $this->hasMany(Vehiculo::class);
}



}

