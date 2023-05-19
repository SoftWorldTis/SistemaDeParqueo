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



    Route::get('/RegistroRol', [\App\Http\Controllers\RolController::class, 'index'])->name('crearRol');
    Route::post('/RegistroRol', [\App\Http\Controllers\RolController::class, 'store'])->name('crearRolGuardar');

    Route::get('/', [\App\Http\Controllers\LobbyController::class, 'index'])->name('inicio');









   
    Route::get('/EditarCliente/{idd}', [\App\Http\Controllers\EditarClientesController::class, 'index'])->name('editarcliente');
    Route::put('/EditarCliente/{idd}', [\App\Http\Controllers\EditarClientesController::class, 'update'])->name('actualizarcliente');
    //Route::resource('/EditarCliente/{idd}', EditarClientesController::class)->name('/EditarCliente');
    Route::resource('/RegistroParqueos',RegisParqueoController::class);

    Route::resource('/RegistroGuardias', GuardiaController::class);

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
});


Route::get('/hola', function () {return view('hola') ;});

