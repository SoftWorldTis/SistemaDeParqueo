<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UsuarioRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:10|max:40',
            'ci' => 'required|numeric|min:100000|max:9999999999|unique:App\Models\User,ci',
            'email' => 'required|email|min:10|max:40',
            'fechanacimiento' => 'required|date',
            'password' => 'required|password|min:8|confirmed',
            'password_confirmation' => 'required',
            'roles'=> 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.regex' => 'El campo solo admite carácteres alfabéticos',
            'name.min' => 'El campo admite mínimo 10 carácteres',
            'name.max' => 'El campo admite máximo 40 carácteres',
            'ci.numeric' => 'El campo CI solo admite números',
            'ci.max' => 'El campo CI admite máximo 10 dígitos',
            'ci.min' => 'El campo CI admite minímo 6 dígitos',
            'ci.unique' => 'El campo CI ya fue registrado',
            'fechanacimiento.date' => 'La Fecha de Nacimiento debe ser una fecha',
            'email.email' => 'Ingresar un correo valido',
            'email.max' => 'El campo Correo admite máximo 40 carácteres',
            'email.min' => 'El campo Correo admite máximo 10 carácteres',

            'passwod.min' => 'La contraseña debe tener minímo 8 carácteres',
            'rol.required' => 'Es campo Roles es obligatorio',
        ];
    }
}
