<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserRolHistory extends Model
{
    use HasFactory;
    protected $table = 'user_role_histories';
    protected $fillable = [
        'userid', 'roleid', 'change', 'updated'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }
}
