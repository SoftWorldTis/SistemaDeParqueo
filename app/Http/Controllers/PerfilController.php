public function perfil(Request $request,$ci){
        $usuario=cliente::where('clienteci',$ci);
        $vehiculos=vehiculo::where('cliente_clienteci',$ci);
        $alquileres=alquiler::where('cliente_clienteci',$ci);
        return view('layouts.Perfil',['cliente'=>$usuario,'vehiculos'=>$vehiculos,'alquileres'=>$alquileres]);
    }