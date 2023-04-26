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
            'guardianombre' => 'required|regex:/^[\pL\s\-]+$/u|min:10|max:40',
            'guardiafechanacimiento' => 'required',
            'guardiacorreo' => 'required|email|min:10|max:40',
            'guardiaci' => 'required|numeric|min:100000|max:9999999999|unique:App\Models\guardia,guardiaci',
            'guardiahoraentrada' => 'required',
            'guardiahorasalida' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'guardiaparqueo.required' => 'Seleccione un parqueo',
            'guardianombre.required' => 'El campo Nombre y Apellidos es obligatorio',
            'guardianombre.regex' => 'El campo solo adminte carácteres alfabéticos',
            'guardianombre.min' => 'El campo admite mínimo 10 carácteres',
            'guardianombre.max' => 'El campo admite máximo 40 carácteres',
            'guardiafechanacimiento.required' => 'La Fecha de Nacimiento es obligatoria',
            'guardiacorreo.required' => 'El campo Correo es obligatorio',
            'guardiacorreo.email' => 'Ingresar un correo valio',
            'guardiacorreo.max' => 'El campo Correo admite máximo 40 carácteres',
            'guardiacorreo.min' => 'El campo Correo admite máximo 10 carácteres',
            'guardiaci.required' => 'El campo CI es obligatorio',
            'guardiaci.numeric' => 'El campo CI solo admite números',
            'guardiaci.max' => 'El campo CI admite máximo 10 dígitos',
            'guardiaci.min' => 'El campo CI admite minímo 6 dígitos',
            'guardiaci.unique' => 'El campo CI ya fue registrado',
            'guardiahoraentrada.required' => 'El campo Hora de entrada es obligatorio',
            'guardiahorasalida.required' => 'El campo Horario es obligatorio'
        ];
    }
}
