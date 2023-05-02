<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\facturaController;
use App\Http\Controllers\RegisParqueoController;
use App\Http\Controllers\GuardiaController;
use App\Http\Controllers\ClienteController;

use App\Http\Controllers\ListaClientesController;
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





Route::get('/main/prueba', function () {
    return view('layouts.menu') ;
  
});


 


Route::group(['prefix'=>'lobby','as'=>'lobby'], function () {
    Route::get('/', function () {return view('lobby') ;});
    Route::get('/EditarCliente/{idd}', [\App\Http\Controllers\EditarClientesController::class, 'index'])->name('/EditarCliente');
    Route::put('/EditarCliente/{idd}', [\App\Http\Controllers\EditarClientesController::class, 'update'])->name('/EditarCliente');
    //Route::resource('/EditarCliente/{idd}', EditarClientesController::class)->name('/EditarCliente');
    Route::resource('/RegistroParqueos',RegisParqueoController::class );
    Route::resource('/RegistroGuardias',GuardiaController::class );
    Route::resource("/RegistroCliente",ClienteController::class);
   
    Route::get('/ListaUsuarios', function () {return view('listaUsuarios') ;});

  

    Route::get('/RegistroUsuarios', function () {return view('registroUsuario') ;});
    Route::get('/RegistroOpciones', function () {return view('registroOpciones') ;});
    Route::get('/RegistroCliente', function () {return view('registroCliente') ;});



    Route::get('/Alquiler',[App\Http\Controllers\facturaController::class,'index'])->name('Alquiler');
    Route::post('/Alquiler',[App\Http\Controllers\facturaController::class,'store'])->name('Alquiler');

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

    Route::get("/ListaClientes",[App\Http\Controllers\ListaClientesController::class,'index'])->name('/ListaClientes');
    Route::post("/ListaClientes",[App\Http\Controllers\ListaClientesController::class,'store'])->name('/ListaClientes');
    Route::delete('/EliminarCliente/{id}',[App\Http\Controllers\ListaClientesController::class,'eliminarCliente'])->name('cliente.eliminar');

    Route::get("/ReporteClientes/imprimir",[App\Http\Controllers\ListaClientesController::class,'show'])->name('/ReporteClientes/imprimir');
 
   
});


Route::get('/hola', function () {return view('hola') ;});

