<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guardia extends Model
{
    use HasFactory;
    protected $table ="guardia";
    protected $primaryKey = "guardiaci";
    public $timestamps = false;
}
