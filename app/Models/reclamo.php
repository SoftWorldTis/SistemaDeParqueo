<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamo extends Model
{
    use HasFactory;
    protected $table ="reclamo";
    protected $primaryKey = "reclamoid";
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
