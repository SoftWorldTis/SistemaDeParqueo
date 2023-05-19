<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol_funcionalidad extends Model
{
    use HasFactory;
    protected $table ="rol_funcionalidad";
    protected $primaryKey = "rfid";
    public $timestamps = false;

}
