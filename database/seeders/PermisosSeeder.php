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
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

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
            'ver-alquiler',
            'crear-alquiler',
            'editar-alquiler',


            //permisos deuda
            'ver-deuda',
            'editar-deuda',
            //permisos pagos
            'ver-pagos',
           

            //permisos caja
            'ver-caja',

            //permisos entradas
            'ver-entradas',
            'crear-entradas',

            //permisos entradas
            'ver-salidas',
            'crear-salidas',

             //permisos entradas
             'ver-salidas',
             'crear-salidas',

             //permisos reclamos
             'ver-reclamos',
             'crear-reclamos',
             'borrar-reclamos',

             //permisos enciar mensajes globales - individuales
             'enviar-mensajes'
             
        ];

        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);    
        }
    
    }
}
