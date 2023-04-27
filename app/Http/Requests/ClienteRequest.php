<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'clientenombrecompleto' => 'required|regex:/^[\pL\s\-]+$/u|min:10|max:40',
            'clienteci' => 'required|numeric|min:100000|max:9999999999||unique:App\Models\cliente,clienteci',
            'clientefechanac' => 'required|date',
            'clientesis' => 'required|numeric|min:120000000|max:999999999|',
            'clientecorreo' => 'required|email|min:10|max:40',
            'clienteV1' => 'required',

            'vehiculomodelo' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'clientenombrecompleto.required' => 'El campo Nombre y Apellidos es obligatorio',
            'clientenombrecompleto.regex' => 'El campo solo adminte carácteres alfabéticos',
            'clientenombrecompleto.min' => 'El campo admite mínimo 10 carácteres',
            'clientenombrecompleto.max' => 'El campo admite máximo 40 carácteres',
            'clienteci.required' => 'El campo CI es obligatorio',
            'clienteci.numeric' => 'El campo CI solo admite números',
            'clienteci.max' => 'El campo CI admite máximo 10 dígitos',
            'clienteci.min' => 'El campo CI admite minímo 6 dígitos',
            'clienteci.unique' => 'El campo CI ya fue registrado',
            'clientefechanac.required' => 'La Fecha de Nacimiento es obligatoria',
            'clientefechanac.date' => 'La Fecha de Nacimiento debe ser una fecha',
            'clientesis.required' => 'El campo Código sis es obligatorio',
            'clientesis.numeric' => 'El campo Código sis solo admite números',
            'clientesis.max' => 'El campo Código sis admite máximo 9 dígitos',
            'clientesis.min' => 'El campo Código sis admite minímo 9 dígitos',
            'clientecorreo.required' => 'El campo Correo es obligatorio',
            'clientecorreo.email' => 'Ingresar un correo valio',
            'clientecorreo.max' => 'El campo Correo admite máximo 40 carácteres',
            'clientecorreo.min' => 'El campo Correo admite máximo 10 carácteres',
            'clienteV1.required' => 'Ingrese al menos un Vehículo',

            'vehiculomodelo.required' => 'El campo es obligatorio'
        ];
    }
}
