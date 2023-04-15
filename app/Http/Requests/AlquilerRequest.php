<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            /*'Parqueo' => 'required',
            'Usuario' => 'required',*/
            'FechaInicio' => 'required',
            'FechaFin' => 'required|after_or_equal:FechaInicio',
            'Sitio' => 'required',
            'Pago' => 'required' 
        ];
    }

    public function messages()
    {
        return[
            /*'Parqueo.required' => 'El campo Parqueo es obligatorio',
            'Usuario.required' => 'El campo Uusario es obligatorio',*/
            'FechaInicio.required' => 'La Fecha Inicial es obligatoria',
            'FechaFin.required' => 'La Fecha Final es obligatorio',
            'FechaFin.after_or_equal' => 'La Fecha debe ser igual o mayor a la Fecha Inicial',
            'Sitio.required' => 'El campo Sitio es obligatorio',
            'Pago.required' => 'Elige una forma de pago'
        ];
    }
}
