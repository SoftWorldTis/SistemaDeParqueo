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

//Nuevo
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\RevisarPermiso;
use App\Http\Controllers\ParqueoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\SalidasController;
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
   // Route::resource('/RenovarAlquiler/{id}', RenovarAlquilerController::class);
});





Route::get('/', function () {return view('welcome') ;});

Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function(){
   
    Route::get('/lobby', function () {return view('lobby') ;});
    
    //Rutas Rol
    Route::get('/crear-rol', [RolController::class,'create'])->middleware('permiso:crear-rol');
    Route::post('/crear-rol', [RolController::class,'store'])->middleware('permiso:crear-rol');

    //Rutas Usuarios
    Route::get('/crear-usuario', [UsuarioController::class,'create'])->middleware('permiso:crear-usuario');
    Route::post('/crear-usuario', [UsuarioController::class,'store'])->middleware('permiso:crear-usuario');
    Route::get('/ver-usuario', [UsuarioController::class,'index'])->middleware('permiso:ver-usuario');
    Route::post('/ver-usuario', [UsuarioController::class,'buscar'])->middleware('permiso:ver-usuario');
    Route::get('/ver-usuario/reporte',[UsuarioController::class,'show'])->middleware('permiso:ver-usuario');
    Route::get('/editar-usuario', [UsuarioController::class,'editarusuarios'])->middleware('permiso:editar-usuario')->name('editarUsuarios');
    Route::get('/editar-usuario/{id}', [UsuarioController::class,'edit'])->middleware('permiso:editar-usuario');
    Route::post('/editar-usuario/{id}', [UsuarioController::class,'update'])->middleware('permiso:editar-usuario');
    Route::get('/borrar-usuario', [UsuarioController::class,'borrar'])->middleware('permiso:borrar-usuario')->name('borrarUsuario');
    Route::get('/borrar-usuario/{id}', [UsuarioController::class,'destroy'])->middleware('permiso:borrar-usuario');

    

    //Rutas Parqueos 
    Route::get('/crear-parqueo', [ParqueoController::class,'create'])->middleware('permiso:crear-parqueo');
    Route::post('/crear-parqueo', [ParqueoController::class,'store'])->middleware('permiso:crear-parqueo');
    Route::get('/ver-parqueo', [ParqueoController::class,'index'])->middleware('permiso:ver-parqueo');
    Route::post('/ver-parqueo', [ParqueoController::class,'buscar'])->middleware('permiso:ver-parqueo');
    Route::get('/ver-parqueo/reporte',[ParqueoController::class,'show'])->middleware('permiso:ver-parqueo');
    Route::get('/editar-parqueo', [ParqueoController::class,'editarparqueos'])->middleware('permiso:editar-parqueo')->name('editarParqueos');
    Route::get('/editar-parqueo/{id}', [ParqueoController::class,'edit'])->middleware('permiso:editar-parqueo');
    Route::post('/editar-parqueo/{id}', [ParqueoController::class,'update'])->middleware('permiso:editar-parqueo');
    Route::get('/borrar-parqueo', [ParqueoController::class,'borrar'])->middleware('permiso:borrar-parqueo')->name('borrarParqueo');
    Route::get('/borrar-parqueo/{id}', [ParqueoController::class,'destroy'])->middleware('permiso:borrar-parqueo');

    //Rutas Vehiculos
    Route::get('/crear-vehiculo', [VehiculoController::class,'create'])->middleware('permiso:crear-vehiculos');
    Route::post('/crear-vehiculo', [VehiculoController::class,'store'])->middleware('permiso:crear-vehiculos');
    Route::get('/ver-vehiculo', [VehiculoController::class,'index'])->middleware('permiso:ver-vehiculos');
    Route::post('/ver-vehiculo', [VehiculoController::class,'buscar'])->middleware('permiso:ver-vehiculos');
    Route::get('/ver-vehiculo/reporte',[VehiculoController::class,'show'])->middleware('permiso:ver-vehiculos');
    Route::get('/editar-vehiculo', [VehiculoController::class,'editarvehiculos'])->middleware('permiso:editar-vehiculos')->name('editarVehiculos');
    Route::get('/editar-vehiculo/{id}', [VehiculoController::class,'edit'])->middleware('permiso:editar-vehiculos');
    Route::post('/editar-vehiculo/{id}', [VehiculoController::class,'update'])->middleware('permiso:editar-vehiculos');
    Route::get('/borrar-vehiculo', [VehiculoController::class,'borrar'])->middleware('permiso:borrar-vehiculos'); 
    Route::get('/borrar-vehiculo/{id}', [VehiculoController::class,'destroy'])->middleware('permiso:borrar-vehiculos');   

    //Rutas Alquiler
    Route::get('/crear-alquiler', [AlquilerController::class,'create'])->middleware('permiso:crear-alquiler');
    Route::post('/crear-alquiler', [AlquilerController::class,'store'])->middleware('permiso:crear-alquiler');
    Route::get('/crear-alquiler/{id}', [AlquilerController::class,'show'])->middleware('permiso:crear-alquiler');
    Route::get('/ver-alquiler', [AlquilerController::class,'index'])->middleware('permiso:ver-alquiler');
    Route::get('/editar-alquiler/{id}', [AlquilerController::class,'edit'])->middleware('permiso:editar-alquiler');
    Route::post('/editar-alquiler/{id}', [AlquilerController::class,'update'])->middleware('permiso:editar-alquiler');

    
    //Rutas Perfil
    Route::get('/ver-perfil', [PerfilController::class,'show']);
    Route::get('/editar-perfil', [PerfilController::class,'edit']);
      //Route::get('/ver-perfil/{id}', [PerfilController::class,'index'])->middleware('permiso:editar-perfil');

    //Rutas entradas
    Route::get('/ver-entradas', [EntradasController::class,'index'])->middleware('permiso:ver-entradas');
    //Rutas salidas
    Route::get('/ver-salidas', [SalidasController::class,'index'])->middleware('permiso:ver-salidas');

   // Route::get('/ver-entradas', [EntradasController::class,'index'])->middleware('permiso:ver-entradas');
   // Route::get('/crear-entradas', [EntradasController::class,'create'])->middleware('permiso:crear-entradas');
    //Route::post('/crear-entradas', [EntradasController::class,'store'])->middleware('permiso:crear-entradas');

  
/*
    //Rutas deudas
    Route::get('/ver-deuda', [DeudaController::class,'index'])->middleware('permiso:ver-deuda');

    //Rutas pagos
    Route::get('/ver-pagos', [PagoController::class,'index'])->middleware('permiso:ver-pagos');
    Route::get('/editar-pagos/{id}', [PagoController::class,'index'])->middleware('permiso:editar-');

    //Rutas caja
    Route::get('/ver-caja', [CajaController::class,'index'])->middleware('permiso:ver-caja');

    //Rutas entradas
    Route::get('/ver-entradas', [EntradasController::class,'index'])->middleware('permiso:ver-entradas');
    Route::get('/crear-entradas', [EntradasController::class,'create'])->middleware('permiso:crear-entradas');
    Route::post('/crear-entradas', [EntradasController::class,'store'])->middleware('permiso:crear-entradas');

    //Rutas salidas
    Route::get('/ver-salidas', [SalidasController::class,'index'])->middleware('permiso:ver-salidas');
    Route::get('/crear-salidas', [SalidasController::class,'create'])->middleware('permiso:crear-salidas');
    Route::post('/crear-salidas', [SalidasController::class,'store'])->middleware('permiso:crear-salidas');
    */
});


