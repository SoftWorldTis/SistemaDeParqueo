<?php

use App\Http\Controllers\AlquilerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\facturaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisParqueoController;
use App\Http\Controllers\GuardiaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ListaClientesController;
use App\Http\Controllers\DeudasController;
use App\Http\Controllers\PerfilController;
use App\Http\Controller\ListaGuardiasController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\FuncionalidadController;
use App\Http\Controllers\RenovarAlquilerController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/profile/{editar}', function ($editar) {
    return view('profile').$editar;
});



Route::get('/login', [App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class,'log'])->name('login');
Route::get('login/registrarAdministrador', [App\Http\Controllers\registrarAdministradorController::class,'index'])->name('registrarAdmin');
Route::post('login/registrarAdministrador', [App\Http\Controllers\registrarAdministradorController::class,'store'])->name('registrarAdmin');
Route::get('/inicio', function () {return view('inicio') ;});



Route::get('/main/prueba', function () {
    return view('layouts.menu') ;

});





Route::group(['prefix'=>'lobby','as'=>'lobby.'], function () {
    Route::get('/', function () {return view('lobby') ;});
    Route::get('/EditarCliente/{idd}', [\App\Http\Controllers\EditarClientesController::class, 'index'])->name('editarcliente');
    Route::put('/EditarCliente/{idd}', [\App\Http\Controllers\EditarClientesController::class, 'update'])->name('actualizarcliente');
    //Route::resource('/EditarCliente/{idd}', EditarClientesController::class)->name('/EditarCliente');
    Route::resource('/RegistroParqueos',RegisParqueoController::class);

    Route::resource('/RegistroGuardias', GuardiaController::class);
    Route::resource('/CrearFuncionalidad', FuncionalidadController::class);

    Route::resource("/RegistroCliente",ClienteController::class);
    Route::resource("/ListaClientes",ListaClientesController::class);


    Route::get('/ListaUsuarios', function () {return view('listaUsuarios') ;});
    Route::get('/ListaReportes', function () {return view('listaReportes') ;});


    Route::get('/RegistroUsuarios', function () {return view('registroUsuario') ;});
    Route::get('/RegistroOpciones', function () {return view('registroOpciones') ;});
    Route::get('/RegistroCliente', function () {return view('registroCliente') ;});



    Route::resource('/Alquiler', AlquilerController::class);
    /*Route::post('/Alquiler', [AlquilerController::class, 'index']);
    Route::get('/Alquiler/{$id}', [AlquilerController::class, 'showparqueo']);
    Route::post('/Alquiler', [AlquilerController::class, 'showcliente']);*/

    //Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    /*
    Route::get('/descargar-pdf', [App\Http\Controllers\pdfController::class,'index'])->name('descargar-pdf');
    */
    /*
    Route::get('/descargar-pdf', function () {$pdf = PDF::loadView('pdf'); return $pdf->download('archivo.pdf');});
    */
      /*
    Route::resource('/Alquiler',facturaController::class);
    */
    Route::get('/pdf', function () {return view('pdf') ;});
    /*
    Route::get('/pdf',[App\Http\Controllers\facturaController::class,'pdf1'])->name('pdf');
    */
    //Route::get("/ListaDeudas",[App\Http\Controllers\DeudasController::class,'index'])->name('/ListaDeudas');
    Route::resource("/ListaDeudas", DeudasController::class);
    //Route::post("/ReporteDeudas/imprimir", 'DeudasController@imprimir');
    //Route::get('/ReporteDeudas/{$id}',  DeudasController::class);

    Route::get("/ListaClientes",[App\Http\Controllers\ListaClientesController::class,'index'])->name('vercliente');
    Route::post("/ListaClientes",[App\Http\Controllers\ListaClientesController::class,'store'])->name('guardarcliente');
    Route::delete('/ListaClientes/{idd}',[App\Http\Controllers\ListaClientesController::class,'destroy'])->name('borrarcliente');

    Route::get("/ReporteClientes/imprimir",[App\Http\Controllers\ListaClientesController::class,'show'])->name('/ReporteClientes/imprimir');

    Route::get("/ListaGuardias",[App\Http\Controllers\ListaGuardiasController::class,'index'])->name('/ListaGuardias');
    Route::get("/ReporteGuardias/imprimir",[App\Http\Controllers\ListaGuardiasController::class,'show'])->name('/ReporteGuardias');

    Route::get("/EditarGuardia/{idd}",[App\Http\Controllers\ListaGuardiasController::class,'edit'])->name('guardia.edit.view');
    Route::post("/ListaGuardias",[App\Http\Controllers\ListaGuardiasController::class,'store'])->name('/ListaGuardias');


    Route::resource('Perfil', PerfilController::class);
    Route::resource("/ListaPagos", PagosController::class);
    Route::resource('/RenovarAlquiler/{id}', RenovarAlquilerController::class);
});


Route::get('/hola', function () {return view('hola') ;});



//rutas
Route::get('/login', function () {
    return view('login');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/loby', function () {
    return view('loby');
});
Route::get('/editar_rol', function () {
    return view('editar_rol');
});
Route::get('/reporte_vehiculos', function () {
    return view('reporte_vehiculos');
});
Route::get('/editar_usuario', function () {
    return view('editar_usuario');
});
Route::get('/cobrar_usuario', function () {
    return view('cobrar_usuario');
});
Route::get('/eliminar_usuario', function () {
    return view('eliminar_usuario');
});
Route::get('/registrar_rol', function () {
    return view('registrar_rol');
});
Route::get('/registrar_funcionalidad', function () {
    return view('registrar_funcionalidad');
});
Route::get('/registro_usuario', function () {
    return view('registro_usuario');
});
Route::get('/registro_vehiculo', function () {
    return view('registrar_vehiculo');
});
Route::get('/editar_vehiculo', function () {
    return view('Editar_vehiculo');
});
Route::get('/editar_un_usuario', function () {
    return view('editar_un_usuario');
});
Route::get('/renovar_alquiler', function () {
    return view('renobar_alquiler');
});
Route::get('/reportes', function () {
    return view('reportes');
});
Route::get('/perfil_usuario', function () {
    return view('perfil_usuario');
});
Route::get('/alquilar_parqueo', function () {
    return view('alquilar_parqueo');
});
Route::get('/editar_alquiler', function () {
    return view('editar_alquiler');
});
Route::get('/pagos_admi', function () {
    return view('pagos_admi');
});
Route::get('/deudas_admi', function () {
    return view('deudas_admi');
});
Route::get('/eliminar_parqueo', function () {
    return view('eliminar_parqueo');
});
Route::get('/editar_parqueo', function () {
    return view('editar_parqueo');
});
Route::get('/loby2', function () {
    return view('loby2');
});
Route::get('/ver_parqueo', function () {
    return view('ver_parqueo');
});
Route::get('/reporte_parqueos', function () {
    return view('reporte_parqueos');
});
Route::get('/registroEntSal', function () {
    return view('registroEntSal');
});
Route::get('/marcar_ingreso', function () {
    return view('marcar_ingreso');
});
Route::get('/marcar_salida', function () {
    return view('marcar_salida');
});
Route::get('/perfil_guardia', function () {
    return view('perfil_guardia');
});
Route::get('/reporte_guardias', function () {
    return view('reporte_guardias');
});
Route::get('/pagar_usuario', function () {
    return view('pagar_usuario');
});

Route::get('/header3',function(){return view('header3');});

