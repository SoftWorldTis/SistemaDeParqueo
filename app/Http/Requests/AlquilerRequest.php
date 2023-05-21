<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlquilerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        //$reserva = $this->route('reserva');
        $fecha_inicio = $this->input('FechaInicio');
        $fecha_fin = $this->input('FechaFin');
        $espacio = $this->input('sitio');
        $usuario = $this->input('usuariosdatosci');
        $rules = [
            'Parqueo' => 'required',
            'Usuario' => 'required',
            'FechaInicio' => 'required',
            'FechaFin' => 'required|after_or_equal:FechaInicio',
            'Pago' => 'required',
            'sitio' => 'required'
            
        ];
        if($usuario != null){
            $rules['usuariosdatosci'] =Rule::unique('alquiler', 'cliente_clienteci')->where(function ($query) {
                    $query->where('cliente_clienteci', $this->input('usuariosdatosci'))
                    ->where('alquiler.alquilerestadopago', false);
                });
           
        }

        if($fecha_fin !=null && $fecha_inicio != null && $espacio !=null){
            $rules ['sitio'] = Rule::unique('alquiler', 'alquilerSitio')->where(function ($query) use ($fecha_inicio, $fecha_fin) {
                return $query->where('alquilerSitio', $this->input('sitio'))
                    ->where(function ($query) use ($fecha_inicio, $fecha_fin) {
                        $query->whereBetween('alquilerFechaIni', [$fecha_inicio, $fecha_fin])
                            ->orWhereBetween('alquilerFechaFin', [$fecha_inicio, $fecha_fin])
                            ->orWhere(function ($query) use ($fecha_inicio, $fecha_fin) {
                                $query->where('alquilerFechaIni', '<=', $fecha_inicio)
                                    ->where('alquilerFechaFin', '>=', $fecha_fin);
                            });
                        }) ;
            });
        }
        return $rules;
    }

    public function messages()
    {
        return[
            'Parqueo.required' => 'El campo Parqueo es obligatorio',
            'Usuario.required' => 'El campo Usario es obligatorio',
            'usuariosdatosci.unique' => 'El usuario tiene una deuda',
            //'FechaInicio.required' => 'La Fecha Inicial es obligatoria',
            'FechaInicio.required' => 'Llene la Fecha de Inico',
            //'FechaFin.required' => 'La Fecha Final es obligatoria',
            'FechaFin.required' => 'Llene la Fecha Final',
            'FechaFin.after_or_equal' => 'La Fecha debe ser igual o mayor a la Fecha Inicial',
            'sitio.required' => 'El campo Sitio es obligatorio',
            'sitio.unique' => 'El Sitio ya fue registrado',
            'Pago.required' => 'Elige una forma de pago'
        ];
    }
}
