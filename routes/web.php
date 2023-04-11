<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/Alquiler', function () {return view('registraralquiler') ;});
});

