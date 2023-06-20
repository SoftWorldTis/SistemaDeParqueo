<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadminRole = Role::create(['name' => 'Superadmin']);

        // Crear los permisos necesarios para el Administrador
        /*$permissions = [
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }*/

        // Asignar todos los permisos al rol de Administrador
        $superadminRole->syncPermissions(Permission::all());

        // Crear el superusuario y asignarle el rol de Administrador
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'softworldtis@gmail.com',
            'password' => bcrypt('12345678'),
            'state' => 'activo',
        ]);
        $superadmin->assignRole('Superadmin');
    }
}
