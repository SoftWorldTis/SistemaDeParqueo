<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class facturaController extends Controller
{
    
   public function index (){
   
    $parqueo = DB::table('estacionamiento')
    ->select('estacionamiento.*')->orderBy('estacionamiento.estacionamientoid','DESC')->get();
    $clientes = DB::select("
    SELECT c.clientenombrecompleto,  c.clientesis, c.clienteci,
    MAX(CASE WHEN row_num = 1 THEN v.vehiculoplaca END) AS vehiculo1,
    MAX(CASE WHEN row_num = 2 THEN v.vehiculoplaca END) AS vehiculo2,
    MAX(CASE WHEN row_num = 3 THEN v.vehiculoplaca END) AS vehiculo3
    FROM cliente c
    JOIN (
    SELECT cliente_clienteci, vehiculoplaca,
    ROW_NUMBER() OVER(PARTITION BY cliente_clienteci ORDER BY vehiculoplaca) AS row_num
    FROM vehiculo
    ) v
    ON c.clienteci = v.cliente_clienteci
    GROUP BY c.clienteci, c.clientesis;
    ");


        return view('registraralquiler')->with('parqueo',$parqueo)->with('clientes',$clientes);
    
    
    /*
    public function pdf1 ($informacion){

        $pdf = PDF::loadView('pdf',['informacion' =>$informacion]);
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        */
    }
    public function store(Request $request){
      
        $request->validate([
          'fechaini' =>['required'],
          'fechafin' =>['required'],
        ]);
        $nombre = $request->input('nombre');
        $parqueo = $request->input('parqueo');
        $fechaini = $request->input('fechaini');
        $fechafin = $request->input('fechafin');
        $hora = $request->input('hora');
        $lugar = $request->input('sitio');
        $cargo = $request->input('costo');
        /*
        $datos= compact ('nombre','parqueo','fechaini','fechafin','hora','lugar','cargo');
        /*
        //dd($datos);
         */
    
      
        return view('pdf',compact('nombre','parqueo','fechaini','fechafin','hora','lugar','cargo'));
     
        /*
        $datos = $request->all();
        /*
        dd($datos);
        */
       
       /*
        $pdf = PDF::loadView('pdf',compact('nombre','parqueo','fechaini','fechafin','hora','lugar','cargo'));
        return $pdf->stream();
         */     
    }
   







    /*
    public function generarFactura(Request $request)
    {
        // Aquí procesas los datos del formulario para generar la factura en PDF
        // Puedes utilizar la librería "dompdf" para generar el PDF, por ejemplo
       
    
        // Generar la factura en PDF usando la librería "dompdf"
        $pdf = \PDF::loadView('factura', [
            'nombre' => $nombre,
            'parqueo' => $park,
            'fechaini' => $date1,
            'fechafin' => $date2,
            'hora' => $hora,
            'lugar' => $espacio,
            'cargo' => $costo,

        ]);
        
        // Descargar el archivo PDF
        return $pdf->download('factura.pdf');
    }
   /*
   
   public function crearfactura(){
      $pdf = new TCPDF();
      $pdf->AddPage();

      // Obtener datos
      $nombre = $_POST['nombre'];
      $fecha = $_POST['fecha'];
      $subtotal = $_POST['subtotal'];
      $iva = $_POST['iva'];
      $total = $_POST['total'];


      $pdf->SetFont('helvetica', 'B', 16);
      $pdf->Cell(0, 10, 'Factura', 0, 1, 'C');
      $pdf->Ln(10);
      $pdf->SetFont('helvetica', '', 12);
      $pdf->Cell(0, 10, 'Nombre: ' . $nombre, 0, 1);
      $pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1);
      $pdf->Ln(10);
      $pdf->SetFont('helvetica', 'B', 12);
      $pdf->Cell(0, 10, 'Detalle', 0, 1);
      $pdf->Ln(10);
      $pdf->SetFont('helvetica', '', 12);
      $pdf->Cell(0, 10, 'Subtotal: ' . $subtotal, 0, 1);
      $pdf->Cell(0, 10, 'IVA: ' . $iva, 0, 1);
      $pdf->Cell(0, 10, 'Total: ' . $total, 0, 1);


      $pdf->Output();

   }
   */
}
