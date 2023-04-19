<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
class pdfController extends Controller
{
   public function index (){
    $pdf = PDF::loadView('pdf'); 
    return $pdf->download('archivo.pdf');
   }
}