<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardiaRequest extends FormRequest
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
            'guardiaparqueo' => 'required|not_in:0',
            'guardianombre' => 'required',
            'guardiafechanacimiento' => 'required',
            'guardiacorreo' => 'required|email|max:40',
            'guardiaci' => 'required|min:100000|max:9999999999|numeric|unique:App\Models\guardia,guardiaci',
            'guardiahoraentrada' => 'required',
            'guardiahorasalida' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'guardiaparqueo.required' => 'Seleccione un parqueo',
            'guardianombre.required' => 'El campo Nombre y Apellidos es obligatorio',
            'guardiafechanacimiento.required' => 'La Fecha de Nacimiento es obligatoria',
            'guardiacorreo.required' => 'El campo Correo es obligatorio',
            'guardiacorreo.email' => 'Ingresar correo valio',
            'guardiacorreo.max' => 'El campo Correo admite máximo 40 carácteres',
            'guardiaci.required' => 'El campo CI es obligatorio',
            'guardiaci.max' => 'El campo CI admite máximo 10 dígitos',
            'guardiaci.min' => 'El campo CI admite minímo 6 dígitos',
            'guardiaci.min' => 'El campo CI ya fue registrado',
            'guardiahoraentrada.required' => 'El campo Hora de entrada es obligatorio',
            'guardiahorasalida.required' => 'El campo Horario es obligatorio'
        ];
    }
}
