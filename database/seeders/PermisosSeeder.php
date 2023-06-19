<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//spatie
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //permisos de rol
            'crear-rol',
            'editar-rol',

            //permisos de usuario
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //permisos vehiculos
            'ver-vehiculos',
            'crear-vehiculos',
            'editar-vehiculos',
            'borrar-vehiculos',

            //permisos parqueo
            'ver-parqueo',
            'crear-parqueo',
            'editar-parqueo',
            'borrar-parqueo',

            //permisos alquiler
            'crear-alquiler',

            //permisos deuda
            'ver-deuda',
            'editar-deuda',

            //permisos pagos
            'ver-pagos',
        
            
            //permisos ingresos
            'ver-ingresos',
        
            //permisos entradas y salidas
            'crear-entradas',
            'crear-salidas',
            'ver-entradas-salidas',

             //permisos reclamos
             'ver-reclamos',
             'crear-reclamos',
             /*'borrar-reclamos',*/

             //permisos enciar mensajes globales - individuales
             'enviar-mensajes',

             //permisos de historial
             'ver-historial-roles-usuario',
             'ver-historial-permisos-rol'
             
        ];

        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);    
        }
    
    }
}