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
        $usuario = $this->input('usuarioid');
        $rules = [
            'Parqueo' => 'required',
            'Usuario' => 'required',
            'FechaInicio' => 'required',
            'FechaFin' => 'required|after_or_equal:FechaInicio',
            'Pago' => 'required',
            'sitio' => 'required'
            
        ];
        if($usuario != null){
            $rules['usuarioid'] =Rule::unique('alquiler', 'userid')->where(function ($query) {
                    $query->where('userid', $this->input('usuarioid'))
                    ->where('alquiler.alquilerestadopago', false);
                });
           
        }

        if($fecha_fin !=null && $fecha_inicio != null && $espacio !=null){
            $rules ['sitio'] = Rule::unique('alquiler', 'alquilersitio')->where(function ($query) use ($fecha_inicio, $fecha_fin) {
                return $query->where('alquilersitio', $this->input('sitio'))
                ->where('estacionamientoid', $this->input('parqueoid'))
                    ->where(function ($query) use ($fecha_inicio, $fecha_fin) {
                        $query->whereBetween('alquilerfechaini', [$fecha_inicio, $fecha_fin])
                            ->orWhereBetween('alquilerfechafin', [$fecha_inicio, $fecha_fin])
                            ->orWhere(function ($query) use ($fecha_inicio, $fecha_fin) {
                                $query->where('alquilerfechaini', '<=', $fecha_inicio)
                                    ->where('alquilerfechafin', '>=', $fecha_fin);
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
            'usuarioid.unique' => 'El usuario tiene una deuda',
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
