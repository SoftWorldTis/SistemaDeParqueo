<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolPermissionHistory extends Model
{
    use HasFactory;
    protected $table = 'role_permissions_histories';
    protected $fillable = [
        'roleid', 'permissionid', 'change', 'updated'
    ];
    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleid');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permissionid');
    }
}
