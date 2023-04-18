<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\facturaController;
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

Route::get('/ver/{id}/{email}', function ($id , $email) {
    return " estas viendo el perfil " .$id ."con el email" .$email ;
});



Route::get('/main/prueba', function () {
    return view('layouts.menu') ;
});
Route::group(['prefix'=>'lobby','as'=>'lobby'], function () {
    Route::get('/', function () {return view('lobby') ;});
    Route::get('/navBar2', function (){return  view('iconos'); });
    Route::get('/RegistroParqueos', function () {return view('registroParqueo') ;});
    Route::get('/RegistroUsuarios', function () {return view('registroUsuario') ;});
    Route::get('/RegistroOpciones', function () {return view('registroOpciones') ;});
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
});

