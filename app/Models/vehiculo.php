<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;
    protected $table ="vehiculo";
    protected $primaryKey = "vehiculoid";
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
