<?php
use Illuminate\Support\Facades\Route;


//Controladores de las rutas
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ParqueoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\IngresosController;
use App\Http\Controllers\MensajeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui se encuentran todas las rutas necesarias para el funcionamiento
| del sistema de parqueo
|
*/



//Ruta Principal
Route::get('/', [LoginController::class,'index'])->name('inicio');

//Rutas de Login
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

//Rutas para todo usuario Autenticado
Route::group(['middleware' => ['auth']], function(){
   
    Route::get('/lobby', function () {return view('lobby') ;});
    
    // Rutas Menu
    Route::get('/ver-reportes', function () {return view('menu.ver-reportes') ;});
    Route::get('/ver-registros', function () {return view('menu.ver-registros') ;});

    //Rutas Rol
    Route::get('/crear-rol', [RolController::class,'create'])->middleware('permiso:crear-rol');
    Route::post('/crear-rol', [RolController::class,'store'])->middleware('permiso:crear-rol');
    Route::get('/editar-rol', [RolController::class,'editarroles'])->middleware('permiso:editar-rol')->name('editarRoles');
    Route::get('/editar-rol/{id}', [RolController::class,'edit'])->middleware('permiso:editar-rol');
    Route::post('/editar-rol/{id}', [RolController::class,'update'])->middleware('permiso:editar-rol');

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
    Route::get('/editar-alquiler/{id}', [AlquilerController::class,'edit']);
    Route::post('/editar-alquiler/{id}', [AlquilerController::class,'update']);
 
    //Rutas deudas
    Route::get('/ver-deuda', [DeudaController::class,'index'])->middleware('permiso:ver-deuda');
    Route::post('/ver-deuda', [DeudaController::class,'store'])->middleware('permiso:ver-deuda');
    Route::get('/ver-deuda/reporte', [DeudaController::class,'show'])->middleware('permiso:ver-deuda');
    Route::get('/editar-deuda', [DeudaController::class,'editardeudas'])->middleware('permiso:editar-deuda')->name('editarDeuda');
    Route::get('/editar-deuda/{id}', [DeudaController::class,'edit'])->middleware('permiso:editar-deuda')->name('cobrarDeuda');
    Route::post('/editar-deuda/{id}', [DeudaController::class,'update'])->middleware('permiso:editar-deuda');

    //Rutas pagos
    Route::get('/ver-pagos', [PagoController::class,'index'])->middleware('permiso:ver-pagos');
    Route::post('/ver-pagos', [PagoController::class,'store'])->middleware('permiso:ver-pagos');
    Route::get('/ver-pagos/reporte', [PagoController::class,'show'])->middleware('permiso:ver-pagos');

    //Rutas Perfil
    Route::get('/ver-perfil', [PerfilController::class,'show']);
    Route::get('/editar-perfil', [PerfilController::class,'edit']);
    Route::post('/editar-perfil/{id}', [PerfilController::class,'update']);

    //Rutas entradas salidas
    Route::get('/registrar-entrada', [EntradasController::class,'buscarEntrada'])->middleware('permiso:crear-entradas');
    Route::get('/registrar-entrada/{alquiler}/{vehiculo}', [EntradasController::class,'marcarEntrada'])->middleware('permiso:crear-entradas');
    Route::get('/registrar-salida', [EntradasController::class,'buscarSalida'])->middleware('permiso:crear-salidas')->name('salida');
    Route::get('/registrar-salida/{id}', [EntradasController::class,'marcarSalida'])->middleware('permiso:crear-salidas');
    Route::get('/ver-entradas-salidas', [EntradasController::class,'index'])->middleware('permiso:ver-entradas-salidas');
    Route::post('/ver-entradas-salidas', [EntradasController::class,'buscar'])->middleware('permiso:ver-entradas-salidas');
    Route::get('/ver-entradas-salidas/reporte',[EntradasController::class,'show'])->middleware('permiso:ver-entradas-salidas')->name('reporteES');

    //Rutas ingresos
    Route::get('/ver-ingresos',[IngresosController::class,'update'])->middleware('permiso:ver-caja');
    Route::get('/ver-ingresos/reporte',[IngresosController::class,'show'])->middleware('permiso:ver-caja');

    //Rutas Mensaje
    Route::get('/enviar-mensaje',[MensajeController::class,'create'])->middleware('permiso:enviar-mensajes');
    Route::post('/enviar-mensaje',[MensajeController::class,'store'])->middleware('permiso:enviar-mensajes');
});


